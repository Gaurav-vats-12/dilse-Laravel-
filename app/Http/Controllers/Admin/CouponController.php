<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\StoreCouponRequest;
use App\Models\Admin\Coupon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
     */
    public function store(StoreCouponRequest $request)
    {
        Coupon::insertGetId([ 'coupon_code' => $request->coupon_code, 'coupan_description' => $request->coupan_description, 'discount_type' => $request->discount_type, 'coupon_amount' => $request->coupon_amount, 'minimum_amount' => $request->minimum_amount, 'maximum_amount' => $request->maximum_amount, 'coupon_type' => $request->coupon_type, 'expiry_date' => $request->expiry_date, 'status'=>$request->status,'created_at' => now(), 'updated_at' => now()]);
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
     */
    public function edit(string $id)
    {
        return view('admin.page.Coupon.edit', ['Coupon' => Coupon::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Coupon::findOrFail($id)->update([ 'coupon_code' => $request->coupon_code, 'coupan_description' => $request->coupan_description, 'discount_type' => $request->discount_type, 'coupon_amount' => $request->coupon_amount, 'minimum_amount' => $request->minimum_amount, 'maximum_amount' => $request->maximum_amount, 'coupon_type' => $request->coupon_type, 'expiry_date' => $request->expiry_date, 'status'=>$request->status,'updated_at' => now()]);
        notyf()->duration(duration: 2000)->addSuccess(message: 'Coupon  Updated Successfully.');
        return redirect()->route(route: 'admin.manage-coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::findOrFail($id)->delete();
        notyf()->duration(2000)->addSuccess('Coupon Deleted Successfully.');
        return redirect()->route('admin.manage-coupon.index');
    }
}
