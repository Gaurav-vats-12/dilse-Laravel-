<?php /** @noinspection ALL */

namespace App\Http\Controllers;
use App\Models\Admin\FoodItem as FoodItemAlias;
use App\Models\Admin\Menu;
use App\Models\Admin\Page;
use Cart;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
class CartController extends Controller
{


public function viewcart(){
    $menus = Menu::whereIn('id',[7,6,5,9])->where('status','active')->get();
    $extra_items = FoodItemAlias::whereIn('menu_id',[7,6,5,9])->where('status',1)->get();
    return view('Pages.cart',compact('extra_items'));
}
public function extra_items(Request $request ){
    $menu_id = $request->menu_id;
    $extra_items = FoodItemAlias::where('menu_id',$menu_id)->where('status',1)->get();
    return view('ajax.extra_items',compact('extra_items'));
}
//
public function update_details(Request $request){
    if ($request->ajax()) {
        if($request->location_type ==='location'){
            $update_location = session()->get('update_location', []);
                session()->put('update_location', $request->store_location);
            return response()->json(['code' => 200 , 'status' =>'success','message'=> 'Location Is Set Successfully']);
        }elseif ($request->location_type ==='spicy') {
                 $spicy_lavel = session()->get('spicy_lavel', []);
                session()->put('spicy_lavel', $request->spicy_lavel);
            return response()->json(['code' => 200 , 'status' =>'success','message'=> 'Spice lavel Successfully Added in the order ']);
        }else{
            $deliveryCost = session()->get('deliveryCost', []);
                session()->put('deliveryCost', $request->deliveryCost);
            return response()->json(['code' => 200 , 'status' =>'success','message'=> 'deliveryCost']);
        }
    }

}
    /**
     * @param Request $request
     * @return JsonResponseAlias
     * @noinspection PhpUndefinedFieldInspection
     */
    public function addtocart(Request $request ){
        try {
            if (!empty($request->product_uid)) {
                $product_uid =(int)$request->product_uid;
                $product=FoodItemAlias::find( $product_uid);
                $cart = session()->get('cart', []);
                if(isset($cart[$request->product_uid])) {
                    $cart[$request->product_uid]['quantity']++;
                }else{
                    $cart[$request->product_uid] = [
                        "id" => $request->product_uid,
                        "name" => $product->name,
                        "image" => $product->image,
                        "price" =>  round($product->price ,2) ,
                        "quantity" => 1,
                        'is_spisy'=> $request->is_spisy
                        ];
                }

                session()->put('cart', $cart);

                return response()->json(['code' => 200 , 'status' =>'success','cart_total'=>count((array) session('cart')),"message"=>"Product added to cart successfully."]);

            }else{
                return response()->json(['code' => 203 ,  'cart_total'=>null,'status' =>'error', "message"=>"Product Id Not Found"]);
            }
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return response()->json(['code' => 400 ,  'cart_total'=>nullValue(),'status' =>'error', "message"=>"Something Wrong"]);
        }
   }

    /**
     * @param Request $request
     * @return JsonResponseAlias
     * @noinspection PhpUndefinedFieldInspection
     */
    public  function  updatecart(Request $request ): JsonResponseAlias
    {
        $subtotal = 0;
        try {
            $product = FoodItemAlias::findOrFail($request->product_oid);
            $cart = session()->get('cart');
            if ($request->qty > 0 || $request->qty  > '0'  ) {
                $cart[$request->product_oid]["quantity"] = $request->qty;
                session()->put('cart', $cart);
                foreach ($cart as $key => $details) {
                    $subtotal =  $subtotal + round($details["price"]  * $details["quantity"], 2) ;
                }
                if(session('order_type') == 'delivery'){
                    $total_before_Tex =   $subtotal + setting('delivery_charge');
                }else{
                    $total_before_Tex =  $subtotal ;
                }
                $total_tax = round(($total_before_Tex * setting('tax' ,0.00)) / 100 ,2);
                $total = $total_before_Tex+$total_tax;
                 return response()->json(['code' => 200 , 'cart_total'=>count((array) session('cart')),'subtotal'=>round($subtotal,2) ,'total_tax'=>$total_tax,'total'=>round($total,2) ,'status' =>'success', "message"=>"Product add to cart successfully"]);
            }else{
                if(isset($request->product_oid)) {
                    unset($request->product_oid);
                    session()->put('cart', $cart);
                }
                foreach ($cart as $key => $details) {
                    $subtotal =  $subtotal + round($details["price"] ,2) ;
                }
                if(session('order_type') == 'delivery'){
                    $total_before_Tex =   $subtotal + setting('delivery_charge' ,0.00);
                }else{
                    $total_before_Tex =  $subtotal ;
                }
                $total_tax = round(($total_before_Tex * setting('tax' ,0.00)) / 100 ,2);
                $total = $total_before_Tex+$total_tax;
                return response()->json(['code' => 200 , 'cart_total'=>count((array) session('cart')),'subtotal'=>round($subtotal,2) ,'total_tax'=>$total_tax,'total'=>round($total,2) ,'status' =>'success', "message"=>"Product add to cart successfully"]);

            }
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return response()->json(['code' => 400 , 'cart_total'=>'Null', 'subtotal'=>nullOrEmptyString() ,'total_tax'=>nullOrEmptyString(), 'total'=>nullOrEmptyString() , 'status' =>'error', "message"=>"Something Wrong"]);
        }
    }


    /**
     * @param string $id
     * @return JsonResponseAlias
     * @noinspection PhpUndefinedFieldInspection
     */
    public function destroy(Request $request ,string $id)  : JsonResponseAlias
    {
        $subtotal = 0;
        try {
            if($id) {
                $cart = session()->get('cart');
                if(isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                }
                foreach ($cart as $key => $details) {
                    $subtotal =  $subtotal + round($details["price"] ,2) ;
                }
                if(session('order_type') == 'delivery'){
                    $total_before_Tex =   $subtotal + setting('delivery_charge' ,0.00);
                }else{
                    $total_before_Tex =  $subtotal ;
                }
                $total_tax = round(($total_before_Tex * setting('tax' ,0.00)) / 100 ,2);
                $total = $total_before_Tex+$total_tax;
                return response()->json(['code' => 200 , 'cart_total'=>count((array) session('cart')),'subtotal'=>round($subtotal,2) ,'total_tax'=>$total_tax,'total'=>round($total,2) ,'status' =>'success', "message"=>"Product  Remove from add to cart  successfully"]);
            }else{
                return response()->json(['code' => 203 ,  'cart_total'=>nullValue(),'status' =>'error', "message"=>"Product Id Not Found"]);
            }

        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return response()->json(['code' => 400 , 'cart_total'=>'Null', 'subtotal'=>nullOrEmptyString() ,'total'=>nullOrEmptyString() , 'status' =>'error', "message"=>"Something Wrong"]);
        }



    }

}







