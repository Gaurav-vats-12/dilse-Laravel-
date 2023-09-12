<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreOrderRequest as StoreOrderRequestAlias;
use App\Models\Order\Order as OrderAlias;
use App\Models\Order\Payments;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias1;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class OrderManagemnetController extends Controller
{
    /**
     * @return ViewAlias|ApplicationAlias|FactoryAlias|ApplicationAlias1
     */
    public function index(): ViewAlias|ApplicationAlias|FactoryAlias|ApplicationAlias1
    {
        return view(view: 'admin.page.order.index')->with('orders', value: OrderAlias::orderBy('id', 'DESC')->get());
    }


    /**
     * @param string $id
     * @return ApplicationAlias1|FactoryAlias|ViewAlias|ApplicationAlias
     */
    public function viewOrder(string $id): ApplicationAlias|ViewAlias|FactoryAlias|ApplicationAlias1
    {

        return view(view: 'admin.page.order.view')->with('orders', value:  OrderAlias::with('orderItems.product', 'payment')->find($id));
    }
    /**
     * @param StoreOrderRequestAlias $request
     * @return JsonResponseAlias
     */
    public  function orderStatus(StoreOrderRequestAlias $request): JsonResponseAlias
    {
        OrderAlias::findOrFail($request->order_id)->update(['time_taken' => $request->order_time_taken,'status' => 'Processing','updated_at' => now() ]);
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Order Change Successfully"]);
    }
    public function ChangeOrderStatus( Request $request): JsonResponseAlias
    {
        OrderAlias::findOrFail($request->order_uid)->update(['status' => 'Delivered','updated_at' => now() ]);
        Payments::where('order_id',$request->order_uid)->update(['payment_status' => 'paid','updated_at' => now() ]);
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Order Change to Delivered Successfully"]);
    }
    public function downloadOrderInPDF(Request $request,string $id): \Illuminate\Http\Response
    {
        $orders= OrderAlias::with('orderItems.product', 'payment')->find($id);
        $pdf = PDF::loadView('admin.page.order.downloadOrderTemplate', compact('orders'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Dilse-Order-'.$orders->full_name.'-'.$id.'.pdf');
    }

}
