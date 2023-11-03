<?php

namespace App\Http\Controllers\User;
use App\Models\Admin\Coupon as CouponAlias;
use Carbon\Carbon as CarbonAlias;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Jorenvh\Share\Share as ShareAlias;

class ReferralController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
   {
    $user_id = (AuthAlias::guard('user')->check()) ? AuthAlias::guard('user')->id() : null;

    $Coupon = CouponAlias::where('user_id', $user_id)->where('status', 1)->first();
    $shareComponent = (new ShareAlias)->page(url: "Here is your Referral code".$Coupon->code, title: null, options: array('class' => 'my-class', 'id' => 'my-id', 'target'=>'_blank','title' => 'my-title', 'rel' => 'nofollow noopener noreferrer'))->facebook()
    ->twitter()
    ->linkedin()
    ->telegram()
    ->whatsapp()
    ->reddit();
    $reffreal_couypon_list = CouponAlias::where('vendor_id', $user_id)->where('parant_coupon_id', $Coupon->id)->where('status', 1)->whereDate('end_date', '>=', CarbonAlias::today()->subDays(1))->get();
    return view('user.Pages.referral.index', data: ['Coupon' => $Coupon,'reffral'=> $reffreal_couypon_list,'shareComponent'=>$shareComponent]);
   }
}
