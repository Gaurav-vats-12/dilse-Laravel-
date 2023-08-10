<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem};

use Illuminate\Http\Request;

class CartController extends Controller
{


public function viewcart(){
    $extra_items = FoodItem::where('extra_items',1)->where('status',1)->limit(6)->get();
    // $cart = session()->get('cart');
    return view('Pages.cart',compact('extra_items'));



}
   public function addtocart(  Request $request ){

    $product = FoodItem::findOrFail($request->product_oid);
    $cart = session()->get('cart', []);
    if(isset($cart[$request->product_oid])) {
        $cart[$request->product_oid]['quantity']++;
    }  else {
        $cart[$request->product_oid] = [
            "id" => $request->product_oid,
            "price" => $product->price,
            "productdetails" => $product,
            "quantity" => 1
        ];
    }
 session()->put('cart', $cart);

    return response()->json(['code' => 200 ,  'cart_total'=>count((array) session('cart')), 'status' =>'success', "message"=>"Product add to cart successfully"]);

//
//      return redirect()->back()->withToastSuccess('Product add to cart successfully!');


   }
}
