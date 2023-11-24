<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreOrderRequest as StoreOrderRequestAlias;
use App\Models\Order\Order as OrderAlias;
use App\Models\Order\Payments;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias1;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderManagemnetController extends Controller
{
    /**
     * @return View|ApplicationAlias|FactoryAlias|ApplicationAlias1
     */
    public function index(): View | ApplicationAlias | FactoryAlias | ApplicationAlias1
    {
        return view(view: 'admin.page.order.index')->with('orders', value: OrderAlias::orderByDesc('id')->get());
    }

    /**
     * @param string $id
     * @return ApplicationAlias1|FactoryAlias|View|ApplicationAlias
     */
    public function viewOrder(string $id): ApplicationAlias | View | FactoryAlias | ApplicationAlias1
    {

        return view(view: 'admin.page.order.view')->with('orders', value: OrderAlias::with('orderItems.product', 'payment')->find($id));
    }
    /**
     * @param StoreOrderRequestAlias $request
     * @return JsonResponseAlias
     */
    public function orderStatus(StoreOrderRequestAlias $request): JsonResponseAlias
    {
        OrderAlias::findOrFail($request->order_id)->update(['time_taken' => $request->order_time_taken, 'status' => 'Processing', 'updated_at' => now()]);
        return response()->json(['code' => 200, 'status' => 'success', "message" => "Order Change Successfully"]);
    }

  /**
   * @param Request $request
   * @return JsonResponseAlias
   */
  public function ChangeOrderStatus(Request $request): JsonResponseAlias
    {
        OrderAlias::findOrFail($request->order_uid)->update(['status' => 'Delivered', 'updated_at' => now()]);
        Payments::where('order_id', $request->order_uid)->update(['payment_status' => 'paid', 'updated_at' => now()]);
        return response()->json(['code' => 200, 'status' => 'success', "message" => "Order Change to Delivered Successfully"]);
    }
  /**
   * @param Request $request
   * @param string $id
   * @return Response
   */
  public function downloadOrderInPDF(Request $request, string $id): \Illuminate\Http\Response
    {
        $orders = OrderAlias::with('orderItems.product', 'payment')->find($id);
        $pdf = PDF::loadView('admin.page.order.downloadOrderTemplate', compact('orders'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Dilse-Order-' . $orders->full_name . '-DilSe-' . $id . '.pdf');
    }

}
