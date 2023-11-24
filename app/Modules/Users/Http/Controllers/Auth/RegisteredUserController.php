<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
use App\Modules\Users\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Services\CouponService;
use Illuminate\Support\Str;
use App\Models\Admin\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('user.auth.register');
    }

  /**
   * Handle an incoming registration request.
   * @param Request $request
   * @return RedirectResponse
   */
    public function store(Request $request): RedirectResponse
    {
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'privacyPolicy' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
if (reffrelsetting('referral_status') === '1'){
    $coupon = CouponService::add([
        'coupon_code'       =>strtoupper(Str::random(10)), // (required) Coupon code
        'discount_type'     => 'percentage',
        'user_id'=> $user->id,
        'user_email'=> $request->email,
        'coupon_description'     =>'The referral Code genrated by '.$request->name.' and their email is '.$request->email.'',
        'discount_amount'   => reffrelsetting('referral_points'),
        'start_date'        => Carbon::today()->toDateString(),
        'end_date'          => null,
        'status'            => 1,
        'minimum_spend'     =>setting('minimum_order_for_delivery'),
        'maximum_spend'     => 0,
        'coupon_type'     => 'referral',
        'use_limit'         => 0,
        'use_same_ip_limit' => 0,
        'user_limit'        => 0,
        'use_device'        => "",
        'multiple_use'      => "yes",
    ]);
}

        event(new Registered($user));
        Auth::guard('user')->login($user);
        return redirect('/user');
    }
}
