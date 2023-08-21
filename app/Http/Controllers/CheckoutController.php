<?php

namespace App\Http\Controllers;
use App\Models\Order\OrderItems as OrderItemsAlias;
use App\Models\Order\Payments;
use App\Models\User\UserAddressManage as UserAddressManageAlias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Stripe\Charge as ChargeAlias;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Exception;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;


class CheckoutController extends Controller
{

    /**
     * @return ApplicationAlias|ViewAlias|FactoryAlias|RedirectResponseAlias
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): ApplicationAlias|ViewAlias|FactoryAlias|RedirectResponseAlias
    {
        $cart = session()->get('cart');
        if(session('cart')){
            return view(view: 'Pages.checkout.create');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * @param StoreCheckoutRequest $request
     * @return \Illuminate\Routing\Redirector|ApplicationAlias|Application|RedirectResponseAlias
     */
    public function create (StoreCheckoutRequest $request): Application|RedirectResponseAlias|\Illuminate\Routing\Redirector|ApplicationAlias
    {
        $user_id = (AuthAlias::guard('user')->check()) ? AuthAlias::guard('user')->id(): null;
        if(AuthAlias::guard('user')->check()){
            $user_address = [
                'user_id' => $user_id,
                'billing_company' => $request->billing_company,
                'billing_address1' => $request->billing_address_1,
                'billing_address2' => $request->billing_address_2,
                'countryId' => $request->billing_country,
                'statesid' => $request->billing_state,
                'city' => $request->billing_city,
                'pincode' => $request->billing_postcode,
                'created_at' => now(),
                'updated_at' => now()
            ];
            UserAddressManageAlias::updateOrCreate(['user_id'=>$request->login_uer_id],$user_address );
        }
        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            "order_date" => date("Y-m-d H:i:s"),
            'full_name' => $request->billing_full_name,
            'company_name' => $request->billing_company,
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
        if($request->payment_method == 'pay_on_delivery') {
            $paymnet_status = [
                'payment_id'=>Str::random(10),
                'order_id'=>$order_id,
                'payment_amount'=>round($request->tototal_amount ,2),
                'payment_method'=>$request->payment_method,
                'payment_status'=>'pending',
                'payment_date'=> date("Y-m-d H:i:s"),
                'created_at' => now(),
                'updated_at' => now()
            ];
            Payments::insert($paymnet_status);
            Session::forget('cart');
            return redirect(route('order_confirm' ,$order_id))->withToastSuccess('Order Placed Successfully');
        }elseif ($request->payment_method == 'pay_on_store'){
            $paymnet_status = [
                'payment_id'=>Str::random(10),
                'order_id'=>$order_id,
                'payment_amount'=>round($request->tototal_amount ,2),
                'payment_method'=>$request->payment_method,
                'payment_status'=>'pending',
                'payment_date'=> date("Y-m-d H:i:s"),
                'created_at' => now(),
                'updated_at' => now()
            ];
            Payments::insert($paymnet_status);
            Session::forget('cart');
            Session::forget('order_type');
            return redirect(route('order_confirm',$order_id))->withToastSuccess('Order Placed Successfully');
        }else{
            Stripe::setApiKey('sk_test_51Ng3mqJhLKjdolzE2GL61wsIWnQtDpRIOcFzLWmFh7AavxCv6DCIoumHsHfb5znC8O0lvPlpnnvpzViO3IXfSafT00pPW1Pumu');
            try {
                $stripe_paymnet = ChargeAlias::create([
                    "amount" => round($request->tototal_amount *100 ,2),
                    "currency" => "usd",
                    "description" => "Dilse Payment",
                    "source" => $request->stripeToken,
                    'metadata' => [
                        'customer_name' => $request->billing_first_name .' '. $request->billing_last_name,
                             'customer_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
                    ],
                ]);
                $paymnet_status = [
                    'payment_id'=>$stripe_paymnet['id'],
                    'order_id'=>$order_id,
                    'payment_amount'=>round($request->tototal_amount ,2),
                    'payment_method'=>$request->payment_method,
                    'paymnet_json'=>json_encode($stripe_paymnet),
                    'payment_status'=>'Paid',
                    'payment_date'=> date("Y-m-d H:i:s"),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                Payments::insert($paymnet_status);
                Session::forget('cart');
                Session::forget('order_type');
                return redirect(route('order_confirm',$order_id))->withToastSuccess('Order Placed Successfully');
            } catch (ApiErrorException $e) {
                $paymnet_status = [
                    'payment_id'=>Str::random(10),
                    'order_id'=>$order_id,
                    'payment_amount'=>round($request->tototal_amount ,2),
                    'payment_method'=>$request->payment_method,
                    'paymnet_json'=>null,
                    'payment_status'=>'failed',
                    'payment_date'=> date("Y-m-d H:i:s"),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                Payments::insert($paymnet_status);
                Session::forget('cart');
                Session::forget('order_type');
                return redirect(route('order_confirm',$order_id))->withToastSuccess('Order Placed Successfully');
            }

        }
    }


}
