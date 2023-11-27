<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Admin\FoodItem as FoodItemAlias;
use App\Models\Admin\Menu;
use App\Models\Admin\Coupon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\CouponService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function viewcart()
    {
        if(Auth::guard('user')->check()){
            session()->put('login_redirct',[]);
        }else{
            session()->put('login_redirct', route('cart.view'));
        }
        $cart = session()->get('login_redirct');
        $menus = Menu::whereIn('id', [7, 6, 5, 9])->where('status', 'active')->get();
        $extra_items = FoodItemAlias::whereIn('menu_id', [7, 6, 5, 9])->where('status', 1)->get();
        return view('Pages.cart', compact('extra_items'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function extra_items(Request $request)
    {
        $menu_id = $request->menu_id;
        $extra_items = FoodItemAlias::where('menu_id', $menu_id)->where('status', 1)->get();
        return view('ajax.extra_items', compact('extra_items'));
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_details(Request $request)
    {
        if ($request->ajax()) {
            if ($request->location_type === 'location') {
                $update_location = session()->get('update_location', []);
                session()->put('update_location', $request->store_location);
                return response()->json(['code' => 200, 'status' => 'success', 'message' => 'Location Is Set Successfully']);
            } elseif ($request->location_type === 'spicy') {
                $spicy_lavel = session()->get('spicy_lavel', []);
                session()->put('spicy_lavel', $request->spicy_lavel);
                return response()->json(['code' => 200, 'status' => 'success', 'message' => 'Spice lavel Successfully Added in the order ']);
            } else {
                $deliveryCost = session()->get('deliveryCost', []);
                session()->put('deliveryCost', $request->deliveryCost);
                return response()->json(['code' => 200, 'status' => 'success', 'message' => 'deliveryCost']);
            }
        }

    }
    /**
     * @param Request $request
     * @return JsonResponse
     * @noinspection PhpUndefinedFieldInspection
     */
    public function addtocart(Request $request)
    {

        try {
            if (!empty($request->product_uid)) {
                $product_uid = (int) $request->product_uid;
                $product = FoodItemAlias::find($product_uid);
                if (!$product) {abort(404);}
                $cart = session()->get('cart');
                if (!$cart) {
                    $cart = [
                        $product_uid => [
                            'id' => $product_uid,
                            "name" => $product->name,
                            "quantity" => 1,
                            "price" => $product->price,
                            "image" => $product->image,
                            'is_spisy' => $request->is_spisy,
                        ],
                    ];
                    session()->put('cart', $cart);
                    return response()->json(['code' => 200, 'status' => 'success', 'cart_total' => count((array) session('cart')), "message" => "Product added to cart successfully.",'cart'=> $cart]);
                }if (isset($cart[$product_uid])) {

                    $cart[$product_uid]['quantity']++;
                    session()->put('cart', $cart);
                    return response()->json(['code' => 200, 'status' => 'success', 'cart_total' => count((array) session('cart')), "message" => "Product added to cart successfully." ,'cart'=> $cart]);
                }
                $cart[$product_uid] = [
                    'id' => $product_uid,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image,
                    'is_spisy' => $request->is_spisy,
                ];
                session()->put('cart', $cart);
                return response()->json(['code' => 200, 'status' => 'success', 'cart_total' => count((array) session('cart')), "message" => "Product added to cart successfully.",'cart'=> $cart]);
            } else {
                return response()->json(['code' => 203, 'cart_total' => null, 'status' => 'error', "message" => "Product Id Not Found"]);
            }
        } catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            return response()->json(['code' => 400, 'cart_total' => nullValue(), 'status' => 'error', "message" => "Something Wrong"]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @noinspection PhpUndefinedFieldInspection
     */
    public function updatecart(Request $request): JsonResponse
    {
        // dd($request->all());

        $apply_coupon = $request->apply_coupon;
        $coupon_code = $request->coupon_code;
        $subtotal = 0;
        try {
            $product = FoodItemAlias::findOrFail($request->product_oid);
            $cart = session()->get('cart');
            if ($request->qty > 0 || $request->qty > '0') {
                $cart[$request->product_oid]["quantity"] = $request->qty;
                session()->put('cart', $cart);
                foreach ($cart as $key => $details) {
                    $subtotal = $subtotal + round($details["price"] * $details["quantity"], 2);
                }
            if ($apply_coupon && $coupon_code) {
                $couponResponse = $this->Coupon_functionalty($coupon_code ,$subtotal,$request->apply_coupon);
                 $discount_total = $couponResponse['discount_total'];
                } else {
                    $discount_total = round( $subtotal ,2);
                    $couponResponse  =['discount_amount'=>0.00,'discount_total'=>round( $subtotal ,2)];
                }
                if (session('order_type') == 'delivery') {
                    $total_before_Tex = $discount_total+ setting('delivery_charge');
                } else {
                    $total_before_Tex = $discount_total;
                }
                $total_tax = round(($total_before_Tex * setting('tax', 0.00)) / 100, 2);
                $total = $total_before_Tex + $total_tax;
                return response()->json(['code' => 200,  'couponResponse'=>$couponResponse,'cart_total' => count((array) session('cart')), 'subtotal' => round($subtotal, 2), 'total_tax' => $total_tax, 'total' => round($total, 2), 'status' => 'success', "message" => "Product add to cart successfully",'cart'=> $cart]);
            } else {
                if (isset($request->product_oid)) {
                    unset($request->product_oid);
                    session()->put('cart', $cart);
                }
                foreach ($cart as $key => $details) {
                    $subtotal = $subtotal + round($details["price"], 2);
                }
                if ($apply_coupon && $coupon_code) {
                    $couponResponse = $this->Coupon_functionalty($coupon_code ,$subtotal,$request->apply_coupon);
                     $discount_total = $couponResponse['discount_total'];
                    } else {
                        $discount_total = 0.00;
                        $couponResponse  =[];
                    }
                if (session('order_type') == 'delivery') {
                    $total_before_Tex = $discount_total + setting('delivery_charge', 0.00);
                } else {
                    $total_before_Tex = $discount_total;
                }
                $total_tax = round(($total_before_Tex * setting('tax', 0.00)) / 100, 2);
                $total = $total_before_Tex + $total_tax;
                return response()->json(['code' => 200, 'couponResponse'=>$couponResponse, 'discount_total'=>$discount_total, 'cart_total' => count((array) session('cart')), 'subtotal' => round($subtotal, 2), 'total_tax' => $total_tax, 'total' => round($total, 2), 'status' => 'success', "message" => "Product add to cart successfully" ,'cart'=> $cart]);
            }
        } catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            return response()->json(['code' => 400, 'cart_total' => 'Null', 'subtotal' => nullOrEmptyString(), 'total_tax' => nullOrEmptyString(), 'total' => nullOrEmptyString(), 'status' => 'error', "message" => "Something Wrong"]);
        }
    }
    /**
     * @param string $id
     * @return JsonResponse
     * @noinspection PhpUndefinedFieldInspection
     */
    public function destroy(Request $request, string $id)
    {
        $subtotal = 0;
        try {
            if ($id) {
                $cart = session()->get('cart');
                $arraySize = count($cart);
                if (isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                }
                if($arraySize ===1){
                    session()->put('coupon', []);
                }
                notyf()->duration(2000)->addSuccess('Product  Remove from add to cart  successfully' ,);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            return redirect()->back();
        }
    }


  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function apply_coupon(Request $request){
        $code       = $request->coupon_code;  $amount     = $request->subtotal;
        $coupon_type =$request->coupon_type;
        $couponResponse = $this->Coupon_functionalty($code ,$amount,$coupon_type);
        return response()->json($couponResponse, 200);
 }

  /**
   * @param $code
   * @param $amount
   * @param $coupon_type
   * @return array|string[]
   */
  protected function Coupon_functionalty($code , $amount, $coupon_type){
        $deviceName = null; $ipaddress  = null; $skipFields =  [];
        $userId = !Auth::guard('user')->check() ? '' : Auth::guard('user')->id();
       $vendorId = $userId;
        if($coupon_type ==='coupon'){
            $coupon = CouponService::validity($code, $amount, $userId, $deviceName, $ipaddress,  $vendorId ,$skipFields);
            if($coupon['status'] ==='error'){
            return $coupon;
        }else{
            $discount_amount = round($coupon['coupon']->discount_amount, 2);
            $discount_total = $amount  - $discount_amount;
            $discount_tex = round(($discount_total * setting('tax', 0.00)) / 100, 2);
            $total = round($discount_total + $discount_tex,2);
            $message  =  "This Coupon Code ".$code." Aplled  Successfully";
            $couponResponse =[  "code" => $code , 'status' => 'success','cart_type' => $coupon_type,  "message" => $message , "amount" => $amount , 'discount_amount'=>$discount_amount, 'discount_total'=>round($discount_total ,2),'tax'=>round($discount_tex ,2), 'total'=>round($total,2),  "coupon" => $coupon];
            session()->put('coupon', $couponResponse);
        }
        }else{
            $discount_amount = 0.00;
            $discount_total = $amount  - $discount_amount;
            $discount_tex = round(($discount_total * setting('tax', 0.00)) / 100, 2);
            $total = round($discount_total + $discount_tex,2);
            $message  =  "This Coupon Code ".$code." Remove  Successfully";
            $coupon =[];
            $couponResponse= [];
            session()->put('coupon', $couponResponse);
        }
        return  [  "code" => $code , 'status' => 'success','cart_type' => $coupon_type,  "message" => $message , "amount" => $amount , 'discount_amount'=>$discount_amount, 'discount_total'=>round($discount_total ,2),'tax'=>round($discount_tex ,2), 'total'=>round($total,2),  "coupon" => $coupon];

    }
}
