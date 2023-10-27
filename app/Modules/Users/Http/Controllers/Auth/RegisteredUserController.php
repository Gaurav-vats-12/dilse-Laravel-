<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
use App\Modules\Users\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use App\Models\Admin\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     *
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
        Coupon::insertGetId([ 'coupon_code' => strtoupper(Str::random(10)), 'coupan_description' => 'The referral Code genrated by '.$request->name.' and their email is '.$request->email.'', 'discount_type' => 'percent', 'coupon_amount' => setting('referrel_points_on_signup'), 'minimum_amount' => 100, 'maximum_amount' => 0.00, 'coupon_type' => 'referral', 'expiry_date' => null, 'status'=>'active','user_id'=>$user->id,'created_at' => now(), 'updated_at' => now()]);
        event(new Registered($user));
        Auth::guard('user')->login($user);
        return redirect('/user');
    }
}
