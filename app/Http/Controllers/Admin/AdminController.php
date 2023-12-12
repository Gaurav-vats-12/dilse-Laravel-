<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FoodItem;
use App\Models\Booking;
use App\Models\Order\Order;
use App\Models\Subscriber;
use App\Modules\Users\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AdminController extends Controller
{

  /**
   * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
   */
  public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.dashboard', [
            'orderCount' => Order::count(),
            'foodItemCount' => FoodItem::count(),
            'UserCount' => User::count(),
            'SubsribeCount' => Subscriber::where('status', 'subscribed')->count(),
            'totalBookings' => Booking::count(),
        ]);
    }
}
