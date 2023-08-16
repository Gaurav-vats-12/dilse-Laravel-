<?php

namespace App\Http\Controllers;
use App\Models\Order\OrderItems as OrderItemsAlias;
use App\Models\Order\Payments;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Order\Order;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        $cart = session()->get('cart');
        if(session('cart')){
            return view('Pages.checkout.create');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * @param StoreCheckoutRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Foundation\Application|Application|RedirectResponse
     */
    public function create (StoreCheckoutRequest $request): Application|RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\Foundation\Application
    {
        $user_id = (AuthAlias::guard('user')->check()) ? 'Hello': null;
        $checkout_value = [
            'user_id' => $user_id,
            "order_date" => date("Y-m-d H:i:s"),
            'full_name' => $request->billing_first_name .' '. $request->billing_last_name,
            'company_name' => $request->billing_company,
            'shipping_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'billing_address' => $request->billing_address_1 .','. $request->billing_address_2.','. $request->billing_country.','. $request->billing_state.','. $request->billing_city.','. $request->billing_postcode,
            'total_amount' => round($request->tototal_amount ,2),
            'status'=> 'Pending',
            'created_at' => now(),
            'updated_at' => now()
        ];
        $order_id = Order::insertGetId($checkout_value);
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
                'paymnet_id'=>Str::random(10),
                'user_id'=>$user_id,
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
            return redirect(route('home'))->withToastSuccess('Order Placed Successfully');

        }elseif ($request->payment_method == 'pay_on_store'){
            $paymnet_status = [
                'paymnet_id'=>Str::random(10),
                'user_id'=>$user_id,
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
            return redirect(route('home'))->withToastSuccess('Order Placed Successfully');
        }else{
            dd('Stripe');
        }
    }
}
