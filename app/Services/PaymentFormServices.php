<?php
namespace App\Services;

use App\Models\Order\Order;
use App\Models\Order\OrderItems as OrderItemsAlias;
use App\Models\Order\Payments;
use App\Services\User_addressServices as User_addressServicesAlias;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stripe\Charge as ChargeAlias;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class PaymentFormServices{

    protected $paymentForm;
    /** @noinspection PhpUnreachableStatementInspection */
    public function PaymentForm($request){
        $user_id = !AuthAlias::guard('user')->check() ? NULL : AuthAlias::guard('user')->id();
        if(AuthAlias::guard('user')->check()){

            $user = AuthAlias::guard('user')->user();
            $user->phone = $request->billing_phone;
            $user->save();
            $addressObject = new User_addressServicesAlias();
           $addressObject->Change_user_address($request ,$user_id);
        }

        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            "order_date" => date("Y-m-d H:i:s"),
            'full_name' => $request->billing_full_name,
            'email_address' => $request->billing_email,
            'phone_number' => $request->billing_phone,
            'shipping_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'billing_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'status'=> 'Pending',
            'order_type' => $request->order_type,
            'sub_total' => round($request->sub_total ,2),
            'tax' => round($request->tax_total ,2),
            'shipping_charge' => round($request->delivery_charge ,2),
            'total_amount' => round($request->tototal_amount ,2),
            'store_location' => $request->store_location,
            'spice_lavel' => $request->spice_lavel,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $cart_datals = [];
        $cart = session()->get('cart', []);
        foreach ($cart as $key => $details) $cart_datals[] = [
            'order_id' => $order_id,
            'product_id' => $details['id'],
            'quantity' => $details['quantity'],
            'price' => $details['price'],
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
                $stripe_paymnet = ChargeAlias::create([
                    "amount" => round($request->tototal_amount * 100, 2),
                    "currency" => "usd",
                    "description" => "Dilse Payment",
                    "source" =>$request->stripeToken,
                    'metadata' => [
                        'customer_name' => $request->billing_first_name . ' ' . $request->billing_last_name,
                        'customer_address' => $request->billing_address_1 . ',' . $request->billing_address_2 . ',' . $request->billing_country . ',' . $request->billing_state . ',' . $request->billing_city . ',' . $request->billing_postcode,
                    ],
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
            'payment_amount'=>round($request->tototal_amount ,2),
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
       return  ['code' => 200 , 'order_id'=>$order_id , 'url'=>  $url , 'statusMessage'=> $statusMessage,'payment_id'=>$payment_id, 'status' =>true, "message"=> $payment_message];
    }
}
?>
