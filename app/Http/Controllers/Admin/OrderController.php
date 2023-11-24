<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreOrderRequest as StoreOrderRequestAlias;
use App\Models\Order\Order;
use App\Models\Order\Order as OrderAlias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function index(): View | \Illuminate\Foundation\Application  | Factory | Application
    {
        return view(view: 'admin.page.order.index')->with('orders', value: OrderAlias::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

  /**
   * Update the specified resource in storage.
   * @param StoreOrderRequestAlias $request
   * @param string $id
   * @return JsonResponse
   */
    public function update(StoreOrderRequestAlias $request, string $id): JsonResponse
    {
        Order::findOrFail($id)->update(['time_taken' => $request->order_time_taken, 'status' => 'Processing', 'updated_at' => now()]);
        return response()->json(['code' => 200, 'status' => 'success', "message" => "Order Change Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
