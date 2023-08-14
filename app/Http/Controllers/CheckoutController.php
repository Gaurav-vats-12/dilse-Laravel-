<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
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
     * @return void
     */
    public function create (StoreCheckoutRequest $request): void
    {
        $user_id = (AuthAlias::guard('user')->check()) ? 'Hello': null;
        $checkout_value = [
            'user_id ' => $user_id,
            "order_date" => date("Y-m-d H:i:s"),
//            'description' => $request->description, 'price' => $request->price,
//            'image' => $ProductImage,
//            'status'=> (isset($request->status)) ? 1 : 0,
//            'created_at' => now(),
//            'updated_at' => now()
        ];
        dd( $checkout_value );


    }
}
