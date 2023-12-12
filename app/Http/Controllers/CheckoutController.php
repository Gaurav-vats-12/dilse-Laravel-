<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Mail\User\Order\OrderNotification;
use App\Mail\User\Sendrewardemail;
use App\Models\Admin\Coupon;
use App\Models\Order\Order;
use App\Modules\Admins\Models\Admin;
use App\Mail\Order\EmailOrderCencelledConfirmation;
use App\Mail\Order\EmailOrderConfirmation;

use App\Notifications\Admin\Order\AdminOrderNotification;
use App\Services\CouponService;
use App\Services\PaymentFormServices;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth as AuthAlias;
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
    public function index(): \Illuminate\Foundation\Application  | View | Factory | RedirectResponse | Application
    {
        $cart = session()->get('cart');
        if (session('cart')) {
            return view(view: 'Pages.checkout.create');
        } else {
            return redirect()->route('home');
        }
    }

  /**
   * @param StoreCheckoutRequest $request
   * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
   * @throws ContainerExceptionInterface
   * @throws NotFoundExceptionInterface
   */
  public function create(StoreCheckoutRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $payment = new PaymentFormServices();
       $resPonse = $payment->PaymentForm($request);
        Notification::send(Admin::all(), new AdminOrderNotification(['type' => 'Order Notification', 'body' => 'You have received a new order with the following details Order Information:- Order ID: ' . $resPonse['order_id'] . '- Customer Name: ' . $request->billing_full_name . ' - Customer Email: ' . $request->billing_email . ' - Order Date: ' . Order::findOrFail($resPonse['order_id'])->order_date . ' ', 'thanks' => 'Thank you', 'notification_url' => url('/admin/order/view/' . $resPonse['order_id'] . ''), 'notification_uuid' => Str::random(10), 'notification_date' => date('Y-m-d H:i:s')]));
        if ($resPonse['statusMessage'] ==='success'){
            Mail::to($request->billing_email)->send(new EmailOrderConfirmation(['PaymentResponse'=> $resPonse, 'CartDetails'=> Order::findOrFail($resPonse['order_id']),'Response'=> $request]));
            $user_id = !AuthAlias::guard('user')->check() ? null : AuthAlias::guard('user')->id();
            if($request->coupon_code){
                $coupon_apply =     CouponService::apply([
                    'order_id'=>$resPonse['order_id'],
                    'user_id'=>$user_id ,
                    'user_email'=>$request->billing_email,
                    'coupon_id'=> (int) $request->coupon_uuid,
                    'discount'=> $request->discout_total,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                if ($coupon_apply){
                    $coupon_array = [
                        'coupon_code'       =>strtoupper(Str::random(10)), // (required) Coupon code
                        'discount_type'     => 'percentage',
                        'user_id'=> $user_id,
                        'user_email'=> $request->billing_email,
                        'parent_coupon_id'=> $request->coupon_uuid,
                        'coupon_description'     =>'Your Referral Reward: from '.$request->billing_full_name.' and  email is'.$request->billing_email.'',
                        'discount_amount'   => 10,
                        'start_date'        => Carbon::today()->toDateString(),
                        'end_date'          => Carbon::today()->addDays(2)->toDateString(),
                        'status'            => 1,
                        'minimum_spend'     =>setting('minimum_order_for_delivery'),
                        'maximum_spend'     => 0,
                        'coupon_type'     => 'referral',
                        'use_limit'         => 1,
                        'use_same_ip_limit' => 0,
                        'user_limit'        => 1,
                        'vendor_id'=> Coupon::find($request->coupon_uuid)->user->id,
                        'use_device'        => "",
                        'multiple_use'      => "no",
                    ];
                     $coupon = CouponService::add($coupon_array);
                    $user = Coupon::find($request->coupon_uuid)->user;
                   Mail::to($user->email)->send(new Sendrewardemail(['PaymentResponse' => $resPonse, 'CartDetails' => Order::findOrFail($resPonse['order_id']),'coupon_array'=>$coupon_array, 'user'=>$user, 'Response' => $request ]));
                }
            }
        }else{
            Mail::to($request->billing_email)->send(new EmailOrderCencelledConfirmation(['PaymentResponse'=> $resPonse, 'CartDetails'=> Order::findOrFail($resPonse['order_id']),'Response'=> $request]));
        }
        notyf()->duration(2000)->addSuccess($resPonse['message']);
        return redirect($resPonse['url']);
    }
}
