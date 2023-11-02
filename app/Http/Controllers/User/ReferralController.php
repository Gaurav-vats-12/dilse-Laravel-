<?php

namespace App\Http\Controllers\User;
use App\Models\Admin\Coupon;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as AuthAlias;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
   public function index(){
    $user_id = (AuthAlias::guard('user')->check()) ? AuthAlias::guard('user')->id() : null;
    $date = today()->format('Y-m-d');
    $Coupon = Coupon::where('user_id', $user_id)->where('status', 1)->first();
    $reffreal_couypon_list = Coupon::where('vendor_id', $user_id)->where('parant_coupon_id', $Coupon->id)->where('status', 1)->whereDate('end_date', '>=', Carbon::today()->subDays(1))->get();
    return view('user.Pages.referral.index', ['Coupon' => $Coupon,'reffral'=> $reffreal_couypon_list]);
   }



}
