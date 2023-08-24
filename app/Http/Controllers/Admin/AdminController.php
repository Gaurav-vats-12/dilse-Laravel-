<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FoodItem;
use App\Models\Booking;
use App\Models\Order\Order;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Services\MailchimpService;
class AdminController extends Controller
{

    public function dashboard(){


    return view('admin.dashboard', [
        'orderCount' =>Order::count(),
        'foodItemCount' => FoodItem::count(),
        'UserCount' =>  User::count(),
        'SubsribeCount' =>Subscriber::where('status','subscribed')->count(),
        'totalBookings' =>  Booking::count()
    ]);
    }

}
