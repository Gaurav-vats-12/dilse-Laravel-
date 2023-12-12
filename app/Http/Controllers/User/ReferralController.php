<?php

namespace App\Http\Controllers\User;
use App\Models\Admin\Coupon;
use Carbon\Carbon as CarbonAlias;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\Share;

class ReferralController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
   {
    $user_id = (Auth::guard('user')->check()) ? Auth::guard('user')->id() : null;
    $Coupon = Coupon::where('user_id', $user_id)->where('status', 1)->first();
    $shareComponent = (new Share)->page(url: "Here is your Referral code ".$Coupon->code, options: array('class' => 'my-class', 'id' => 'my-id', 'target'=>'_blank','title' => 'my-title', 'rel' => 'nofollow noopener noreferrer'))->facebook()->twitter()->linkedin()->telegram()->whatsapp()->reddit();
    $reffreal_coupon_list = Coupon::where('vendor_id', $user_id)->where('parant_coupon_id', $Coupon->id)->where('status', 1)->whereDate('end_date', '>=', CarbonAlias::today()->subDays(1))->get();
    return view('user.Pages.referral.index', data: ['Coupon' => $Coupon,'reffral'=> $reffreal_coupon_list,'shareComponent'=>$shareComponent]);
   }
}
