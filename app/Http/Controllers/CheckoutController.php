<?php

namespace App\Http\Controllers;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Mail\Order\EmailOrderCencelledConfirmation;
use App\Mail\Order\EmailOrderConfirmation;
use App\Models\Order\Order;
use App\Modules\Admins\Models\Admin;
use App\Notifications\Admin\Order\AdminOrderNotification;
use App\Services\PaymentFormServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CheckoutController extends Controller
{


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|RedirectResponse|Application
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
     * @return JsonResponse
     */
    public function create (StoreCheckoutRequest $request)
    {
        // dd($request->all());
        $payment = new PaymentFormServices();
          $resPonse = $payment->PaymentForm($request);
        Notification::send(Admin::all(), new AdminOrderNotification(['type' => 'Order Notification', 'body' => 'You have received a new order with the following details Order Information:- Order ID: ' . $resPonse['order_id'] . '- Customer Name: ' . $request->billing_full_name . ' - Customer Email: ' . $request->billing_email . ' - Order Date: ' . Order::findOrFail($resPonse['order_id'])->order_date . ' ', 'thanks' => 'Thank you', 'notification_url' => url('/admin/order/view/' . $resPonse['order_id'] . ''), 'notification_uuid' => Str::random(10), 'notification_date' => date('Y-m-d H:i:s')]));
       if ($resPonse['statusMessage'] ==='error'){
         Mail::to($request->billing_email)->send(new EmailOrderCencelledConfirmation(['PaymentResponse'=> $resPonse, 'CartDetails'=> Order::findOrFail($resPonse['order_id']),'Response'=> $request]));
       }else{
        Mail::to($request->billing_email)->send(new EmailOrderConfirmation(['PaymentResponse'=> $resPonse, 'CartDetails'=> Order::findOrFail($resPonse['order_id']),'Response'=> $request]));
       }
       notyf()->duration(2000) ->addSuccess($resPonse['message']);
        return  redirect( $resPonse['url']);

    }
}
