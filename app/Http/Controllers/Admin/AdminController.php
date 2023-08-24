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
        $orderCount = Order::count();
        $foodItemCount = FoodItem::count();
        $UserCount = User::count();
        $SubsribeCount = Subscriber::count();
        $totalBookings = Booking::count();

    return view('admin.dashboard', [
        'orderCount' => $orderCount,
        'foodItemCount' => $foodItemCount,
        'UserCount' => $UserCount,
        'SubsribeCount' =>$SubsribeCount,
        'totalBookings' => $totalBookings
    ]);
    }

  public function show($id ){
    $email_addresss = Subscriber::findOrFail($id);
    $email_address = $email_addresss->email_address;
    $mailchimp = new MailchimpService();
    $UserCount = $mailchimp->UnsubscribeToList($email_address, env('MAILCHIMP_API_KEY'));
    return view('admin.manage-subscriber-view', ['id' => $id]);
 }
}
