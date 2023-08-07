<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem};

use Illuminate\Http\Request;

class CartController extends Controller
{


   public function addtocart( string $id ){

    $product = FoodItem::findOrFail($id);
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    }  else {
        $cart[$id] = [
            "id" => $id,
            "price" => $product->price,
            "quantity" => 1
        ];
    }
     return redirect()->back()->withToastSuccess('Product add to cart successfully!');


   }
}
