<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAddress\UpdateStroreRequest as UpdateStroreRequestAlias;
use App\Models\Admin\FoodItem as FoodItemAlias;
use App\Models\Order\Order;
use App\Models\Order\Payments;
use App\Models\User\UserAddressManage as UserAddressManageAlias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
  /**
   * @return View|\Illuminate\Foundation\Application|FactoryAlias|Application
   */
  public function dashboard(): View|\Illuminate\Foundation\Application|FactoryAlias|Application
    {
        return view('user.dashboard');
    }

    /**
     * @return Application|FactoryAlias|View
     */
    public function user_address(): View|FactoryAlias|Application
    {
        return view('user.profile.profileaddressedit');
    }

    /**
     * @param UpdateStroreRequestAlias $request
     * @return RedirectResponse
     */
    public function update_address(UpdateStroreRequestAlias $request): RedirectResponse
    {
        $user_address = [
            'user_id' => $request->login_uer_id,
            'billing_address1' => $request->billing_address_1,
            'billing_address2' => $request->billing_address_2,
            'countryId' => $request->billing_country,
            'statesid' => $request->billing_state,
            'city' => $request->billing_city,
            'pincode' => $request->billing_postcode,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        UserAddressManageAlias::updateOrCreate(['user_id' => $request->login_uer_id], $user_address);
        notyf()->duration(2000)->addSuccess('User  Address Updated');
        return Redirect::back();
    }

    /**
     * @param Request $request
     * @return View|\Illuminate\Foundation\Application|FactoryAlias|Application
     */
    public function listingOrder(Request $request): View |\Illuminate\Foundation\Application| FactoryAlias | Application
    {$user_id = (AuthAlias::guard('user')->check()) ? AuthAlias::guard('user')->id() : null;

        if ($request->ajax()) {
            $filterType = $request->filterType;
            if ($filterType === 'order') {
                if ($request->filterValue === 'all') {
                    $OrderDetails = Order::where('user_id', $user_id)->whereIn('status', ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'])->orderBy('id', 'DESC')->get();
                    return view('user.ajax.OrderDetails', ['OrderDetails' => $OrderDetails]);
                } else {
                    $OrderDetails = Order::where('user_id', $user_id)->where('status', $request->filterValue)->orderBy('id', 'DESC')->get();
                    return view('user.ajax.OrderDetails', ['OrderDetails' => $OrderDetails]);
                }
            } else {
                if ($request->filterValue === 'all') {
                    $OrderDetails = Payments::whereIn('payment_status', ['pending', 'paid', 'failed'])->with('order')->orderBy('id', 'DESC')->get()->first()->order;
                    return view('user.ajax.OrderDetails', ['OrderDetails' => $OrderDetails]);
                } else {
                    $OrderDetails = Order::with('payment')->where('payment_status', $request->filterValue)->get();
                    return view('user.ajax.OrderDetails', ['OrderDetails' => $OrderDetails]);
                }
            }
        } else {
            $OrderDetails = Order::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
            return view('user.Pages.Order.view-order-list', compact('OrderDetails'));
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function OrderCancelled($id): RedirectResponse
    {
        Order::findOrFail($id)->update(['status' => 'Cancelled', 'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('This Order Cancelled SuccessFully');
        return Redirect::back();
    }

    /**
     * @param $id
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     */
    public function OrderReorder($id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $order_details = Order::findOrFail($id);
        $orderItems = $order_details->orderItems;
        if (session('cart')) {
            Session::forget('cart');
        }
        foreach ($orderItems as $key => $details) {
            $cart[$details->product_id] = [
                "id" => $details->product_id,
                "name" => FoodItemAlias::findOrFail($details->product_id)->name,
                "quantity" => $details->quantity,
                "price" => round($details->price, 2),
                "image" => FoodItemAlias::findOrFail($details->product_id)->image,
                'is_spisy' => $order_details->spice_lavel,
                "productdetails" => FoodItemAlias::findOrFail($details->product_id),
            ];
        }
        session()->put('cart', $cart);
        notyf()->duration(2000)->addSuccess('Items Added to Card Successfully');
        return redirect(route('checkout.view'));
    }
}
