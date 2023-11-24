<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\StoreCouponRequest;
use App\Services\CouponService;
use App\Models\Admin\Coupon;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class CouponController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.Coupon.index', ['Coupon' => Coupon::orderByDesc('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
       return view(view: 'admin.page.Coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCouponRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCouponRequest $request): RedirectResponse
    {
        $coupon = CouponService::add([
            'coupon_code'       => $request->coupon_code, // (required) Coupon code
            'discount_type'     => $request->discount_type, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'coupon_description'     => $request->coupon_description, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'discount_amount'   => $request->coupon_amount, // (required) discount amount or percentage value
            'start_date'        => Carbon::today()->toDateString(), // (required) coupon start date
            'end_date'          => $request->expiry_date,
            'status'            => ($request->status ==='active') ? 1 : 0, // (required) two status are accepted. (for active 1 and for inactive 0)
            'minimum_spend'     =>$request->minimum_amount, // (optional) for apply this coupon minimum spend amount. if set empty then it's take unlimited
            'maximum_spend'     => $request->maximum_amount, // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
            'coupon_type'     => $request->coupon_type, // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
            'use_limit'         => 1, // (optional) how many times are use this coupon. if set empty then it's take unlimited
            'use_same_ip_limit' => 1, // (optional) how many times are use this coupon in same ip address. if set empty then it's take unlimited
            'user_limit'        => 0, // (optional) how many times are use this coupon a user. if set empty then it's take unlimited
            'use_device'        => "", // (optional) This coupon can be used on any device
            'multiple_use'      => "yes", // (optional) you can check manually by this multiple coupon code use or not
        ]);
        notyf()->duration(duration: 2000)->addSuccess(message: 'Coupon  Created Successfully.');
        return redirect()->route(route: 'admin.manage-coupon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.Coupon.edit', ['Coupon' => Coupon::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param StoreCouponRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(StoreCouponRequest $request, string $id): RedirectResponse
    {
        $update = CouponService::update([
            'coupon_code'       => $request->coupon_code, // (required) Coupon code
            'discount_type'     => $request->discount_type, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'coupon_description'     => $request->coupon_description, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'discount_amount'   => $request->coupon_amount, // (required) discount amount or percentage value
            'start_date'        => Carbon::today()->toDateString(), // (required) coupon start date
            'end_date'          => $request->expiry_date,
            'status'            => ($request->status ==='active') ? 1 : 0, // (required) two status are accepted. (for active 1 and for inactive 0)
            'minimum_spend'     =>$request->minimum_amount, // (optional) for apply this coupon minimum spend amount. if set empty then it's take unlimited
            'maximum_spend'     => $request->maximum_amount, // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
            'coupon_type'     => $request->coupon_type, // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
            'use_limit'         => 1, // (optional) how many times are use this coupon. if set empty then it's take unlimited
            'use_same_ip_limit' => 1, // (optional) how many times are use this coupon in same ip address. if set empty then it's take unlimited
            'user_limit'        => 0, // (optional) how many times are use this coupon a user. if set empty then it's take unlimited
            'use_device'        => "", // (optional) This coupon can be used on any device
            'multiple_use'      => "yes", // (optional) you can check manually by this multiple coupon code use or not
        ] ,$id);
        notyf()->duration(duration: 2000)->addSuccess(message: 'Coupon  Updated Successfully.');
        return redirect()->route(route: 'admin.manage-coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $delete  = CouponService::remove($id);
        notyf()->duration(2000)->addSuccess('Coupon Deleted Successfully.');
        return redirect()->route('admin.manage-coupon.index');
    }
}
