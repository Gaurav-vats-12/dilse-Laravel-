<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PaymentStatusController extends Controller
{
  /**
   * @param Request $request
   * @return \Illuminate\Foundation\Application|View|Factory|Redirector|Application|RedirectResponse
   */
  public function OrderPaymentStatus(Request $request): \Illuminate\Foundation\Application|View|Factory|Redirector|Application|RedirectResponse
    {
        if ($request->has('order_id')) {
            $orderWithItems = Order::with('OrderItems')->find($request->order_id);
            return view('Pages.OrderPaymentStatus', ['orderItem' => $orderWithItems]);
        } else {
            return redirect(route('home'));
        }

    }
}
