<?php
namespace App\Services;

use App\Models\Order\Order;
use App\Models\Order\OrderItems as OrderItemsAlias;
use App\Models\Order\Payments;
use App\Models\CouponHistory;
use App\Services\User_addressServices as User_addressServicesAlias;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stripe\Charge as ChargeAlias;
use App\Models\{Country,State};
use Stripe\Customer as Customeras;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class PaymentFormServices{

  /**
   * @param $request
   * @return array
   * @throws ContainerExceptionInterface
   * @throws NotFoundExceptionInterface
   */
  public function PaymentForm($request): array
  {
       $user_id = !AuthAlias::guard('user')->check() ? null : AuthAlias::guard('user')->id();
        $user_type = !AuthAlias::guard('user')->check() ? 'guest' : 'user';
        if(AuthAlias::guard('user')->check()){
            $user = AuthAlias::guard('user')->user();
            $user->phone = $request->billing_phone;
            $user->save();
            $addressObject = new User_addressServicesAlias();
           $addressObject->Change_user_address($request ,$user_id);
        }
        $dilvery_tip = ($request->dilvery_tip) ? round($request->dilvery_tip ,2) : 0.00 ;
        $grand_Total = round($request->sub_total ,2) +  round($request->tax_total ,2)+ round($request->shipping_charge ,2) + $dilvery_tip - $request->discout_total;
        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            'user_type' => $user_type,
            "order_date" => date("Y-m-d H:i:s"),
            'full_name' => $request->billing_full_name,
            'email_address' => $request->billing_email,
            'phone_number' => $request->billing_phone,
            'shipping_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'billing_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'status'=> 'Pending',
            'order_type' => $request->order_type,
            'sub_total' => round($request->sub_total ,2),
            'discount_price' => round($request->discout_total ,2),
            'tax' => round($request->tax_total ,2),
            'delivery_tip' => $dilvery_tip,
            'shipping_charge' => round($request->shipping_charge ,2),
            'total_amount' => round($grand_Total ,2),
            'store_location' => $request->store_location,
            'coupon_code' => $request->coupon_code,
            'spice_lavel' => $request->spice_lavel,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $cart_datals = [];
        $cart = session()->get('cart', []);
        foreach ($cart as $key => $details)   $cart_datals[] = [
            'order_id' => $order_id,
            'product_id' =>$key,
            'price' => $details['price'],
            'quantity'=>$details['quantity'],
            'created_at' => now(),
            'updated_at' => now()
        ];
        OrderItemsAlias::insert($cart_datals);
        if ($request->payment_method == 'Pay On  Delivery') {
          $payment_method = 'PayOnDelivery';
          $payment_status = 'pending';
          $payment_id = Str::random(10);
            $payment_json = null;
            $statusMessage = 'success';
            $payment_message = "Order Placed Successfully ";
             $url = route('thank-you.orderStatus',['order_id' =>  $order_id, 'PaymentStatus' => 'pending', 'payment_id' =>$payment_id]);

        } elseif ($request->payment_method == 'Pay On Store') {
            $payment_method = 'PayOnStore';
            $payment_status = 'pending';
            $payment_json = null;
            $payment_id = Str::random(10);
            $statusMessage = 'success';
            $payment_message = "Order Placed Successfully ";
            $url = route('thank-you.orderStatus',['order_id' =>  $order_id, 'PaymentStatus' => 'pending', 'payment_id' =>$payment_id]);
        }else{
            Stripe::setApiKey(Config::get('stripe.api_keys.secret_key', ''));
            try {
                $customer = \Stripe\Customer::create(array(
                    "address" => [
                            "line1" => $request->billing_address_1,
                            "line2" => $request->billing_address_2,
                            "postal_code" =>  $request->billing_postcode,
                            "city" => $request->billing_city,
                            "state" => State::findOrFail($request->billing_state)->iso2,
                            "country" => Country::findOrFail($request->billing_country)->iso2,
                        ],
                    "email" => $request->billing_email,
                    "name" => $request->billing_full_name,
                    'phone'=> trim($request->billing_phone),
                    "source" => $request->stripeToken
                 ));
                if(AuthAlias::guard('user')->check()){
                    $user = AuthAlias::guard('user')->user();
                    $user->stripecustomerid =$customer->id;
                    $user->save();
                }
                $stripe_paymnet = ChargeAlias::create([
                    "amount" => $grand_Total *100 ,
                    "currency" => "usd",
                    "customer" => $customer->id,
                    "description" => "Dilse Payment form Order Number-".$order_id.""  ,
                    "shipping" => [
                        "name" => $request->billing_full_name,
                      "address" => [
                        "line1" => $request->billing_address_1,
                        "line2" => $request->billing_address_2,
                        "postal_code" =>  $request->billing_postcode,
                        "city" => $request->billing_city,
                        "state" => State::findOrFail($request->billing_state)->iso2,
                        "country" => Country::findOrFail($request->billing_country)->iso2,
                      ],

                    ]
            ]);
                $payment_id = $stripe_paymnet->id;
                $payment_method = 'PayOnOnline';
                $payment_json = json_encode($stripe_paymnet);
                $payment_status = 'paid';
                $statusMessage = 'success';
                $payment_message = "Order Placed Successfully ";
                $url = route('thank-you.orderStatus',['order_id' =>  $order_id, 'PaymentStatus' => 'Paid', 'payment_id' =>$payment_id]);
            } catch (ApiErrorException $e) {

                $error = $e->getError();
                $payment_id = Str::random(10);
                $payment_method = 'PayOnOnline';
                $payment_json = json_encode($error);
                $payment_status = 'failed';
                $payment_message = $error['message'];
                $statusMessage = 'error';
                $url = route('thank-you.orderStatus',['order_id' =>  $order_id, 'PaymentStatus' => $error['code'], 'payment_id' =>$payment_id]);
                Order::findOrFail($order_id)->update(['status' => 'Cancelled','updated_at' => now() ]);
            }
        }
        Payments::insert([
            'payment_id'=>$payment_id,
            'order_id'=>$order_id,
            'payment_amount'=>$grand_Total ,
            'payment_method'=>$payment_method,
            'paymnet_json'=>$payment_json,
            'payment_status'=> $payment_status,
            'payment_date'=> date("Y-m-d H:i:s"),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Session::forget('cart');
        Session::forget('order_type');
        Session::forget('deliveryCost');
        Session::forget('spicy_lavel');
        Session::forget('store_location');
        Session::forget('coupon');
       return  ['code' => 200 , 'order_id'=>$order_id , 'url'=>  $url , 'statusMessage'=> $statusMessage,'payment_id'=>$payment_id, 'status' =>true, "message"=> $payment_message];
    }
}
?>
