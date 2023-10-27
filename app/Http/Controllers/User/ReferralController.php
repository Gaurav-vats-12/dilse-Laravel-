<?php

namespace App\Http\Controllers\User;
use App\Models\Admin\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as AuthAlias;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
   public function index(){
    $user_id = (AuthAlias::guard('user')->check()) ? AuthAlias::guard('user')->id() : null;
    $date = today()->format('Y-m-d');
    $Coupon = Coupon::where('user_id', $user_id)->where('status', 'active')->first();
    return view('user.Pages.referral.index', ['Coupon' => $Coupon]);
   }
}
