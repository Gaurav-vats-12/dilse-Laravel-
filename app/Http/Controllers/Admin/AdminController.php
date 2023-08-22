<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Services\MailchimpService;
use Newsletter;

class AdminController extends Controller
{

    public function dashboard(){
        $orderCount = \App\Models\Order\Order::count();
        $foodItemCount = \App\Models\Admin\FoodItem::count();
        $UserCount = \App\Modules\Users\Models\User::count();
        $SubsribeCount = \App\Models\Subscriber::count();
        $totalBookings = \App\Models\Booking::count();

    return view('admin.dashboard', [
        'orderCount' => $orderCount,
        'foodItemCount' => $foodItemCount,
        'UserCount' => $UserCount,
        'SubsribeCount' =>$SubsribeCount,
        'totalBookings' => $totalBookings
    ]);
    }
  public function showOrderCount(){
    $subscribers = Subscriber::orderBy('email_address')->get();
    return view('admin.subscriber-manage', ['subscribers' => $subscribers]);
  }
  public function show($id ){
    $email_addresss = Subscriber::findOrFail($id);
    $email_address = $email_addresss->email_address;
    $mailchimp = new MailchimpService();
    $UserCount = $mailchimp->UnsubscribeToList($email_address, env('MAILCHIMP_API_KEY'));

    return view('admin.manage-subscriber-view', ['id' => $id]);
 }
}
