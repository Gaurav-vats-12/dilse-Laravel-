<?php
namespace App\Services;


use App\Models\Order\Order;
use App\Models\Order\OrderItems as OrderItemsAlias;
use App\Models\Order\Payments;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stripe\Charge as ChargeAlias;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class PaymentFormServices{

    protected $paymentForm;

    public function PaymentForm($request){

        $user_id = !AuthAlias::guard('user')->check() ? NULL : AuthAlias::guard('user')->id();
        if(AuthAlias::guard('user')->check()){

        }
        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            "order_date" => date("Y-m-d H:i:s"),
            'full_name' => $request->billing_full_name,
            'email_address' => $request->billing_email,
            'phone_number' => $request->billing_phone,
            'shipping_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'billing_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'total_amount' => round($request->tototal_amount ,2),
            'status'=> 'Pending',
            'order_type' => $request->order_type,
            'shipping_charge' => round($request->shipping_charge ,2),
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
          $payment_method = 'Pay On  Delivery';
          $payment_status = 'pending';
          $payment_id = Str::random(10);
            $payment_json = null;
            $payment_message = "Payment  Successfully";


        } elseif ($request->payment_method == 'Pay On Store') {
            $payment_method = 'Pay On Store';
            $payment_status = 'pending';
            $payment_json = null;
            $payment_id = Str::random(10);
            $payment_message = "Payment  Successfully";

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
                $payment_id = Str::random(10);
                $payment_method = 'Pay On Online (Stripe)';
                $payment_json = json_encode($stripe_paymnet);
                $payment_status = 'Paid';
                $payment_message = "Payment  Successfully";
            } catch (ApiErrorException $e) {
                return $e;
                $payment_id = Str::random(10);
                $payment_method = 'Pay On Online (Stripe)';
                $payment_json = null;
                $payment_status = 'failed';
                $payment_message = "Payment Not Successfully";
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
       return  ['code' => 200 , 'order_id'=>$order_id ,'payment_id'=>$payment_id, 'status' =>true, "message"=> $payment_message];
    }
}
?>
