<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function OrderPaymentStatus(Request $request)
    {
        if ($request->has('order_id')) {
            $orderWithItems = Order::with('OrderItems')->find($request->order_id);
            return view('Pages.OrderPaymentStatus', ['orderItem' => $orderWithItems]);
        } else {
            return redirect(route('home'));
        }

    }
}
