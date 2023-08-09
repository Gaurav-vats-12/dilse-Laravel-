<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem,Menu};
use Illuminate\Http\Request;
class MenuController extends Controller
{
   public function menu(){
    $menu_id = Menu::where('menu_slug','appetizers')->first()->id;
    $FoodItem = FoodItem::where('menu_id',$menu_id)->paginate(12);
    return view('Pages.menu',compact('FoodItem'));

   }

   public function fetchmenuviaslug(Request $request){
    $menu_id = Menu::where('menu_slug',$request->menu_slug)->first()->id;
    $FoodItem = FoodItem::where('menu_id',$menu_id)->paginate(12);
    $html ='';
    if (isset($FoodItem) && count($FoodItem) >0) {
        foreach ($FoodItem as $key => $FoodItemValue) {
            $html.='<div class="best_food_crd"> <div class="best_food_crd_img"><img src="'.url('storage/products/'.$FoodItemValue->image.'').'" alt=""></div><div class="best_food_cntnt"><div class="best_food_txt"><h3>'.$FoodItemValue->name.'</h3><h2>$'.$FoodItemValue->price.'</h2></div> <div class="best_btn_food"><a href="'.route('cart.add', $FoodItemValue->id) .'" class="theme_btn btn-block text-center" role="button">Add to cart</a></div></div></div>';
        }

        // dd('asdsasad');

        # code...
    } else {
        $html.='<h4>No Food Item  Found</h4>';
    }

    $data = ['status'=>'success','content'=>$html] ;

    return response()->json($data);

   }
}
