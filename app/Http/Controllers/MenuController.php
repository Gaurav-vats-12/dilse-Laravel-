<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem,Menu};
use Illuminate\Http\Request;
class MenuController extends Controller
{
    public function menu(Request $request){
        $order_type = session()->get('order_type');
        if ($request->ajax()) {
            $slug = $request->slug;
            $current_url = $request->current_url;
            if($current_url =='home'){
                session()->put('order_type', $request->type);
                $slug = 'appetizers';
                $menu_id = Menu::where('menu_slug',$slug)->first()->id;
                $FoodItem = FoodItem::where('menu_id',$menu_id)->where('extra_items',0)->where('status',1)->paginate(6);
                return view('Pages.menu',compact('FoodItem','slug'));
            }else if ($current_url =='cart.view'){
                session()->put('order_type', $request->type);
                return response()->json(['code' => 200 , 'status' =>'success','url'=> route('checkout.view')]);
            }else{
                $menu_id = Menu::where('menu_slug',$slug)->first()->id;
                $FoodItem = FoodItem::where('menu_id',$menu_id)->where('extra_items',0)->where('status',1)->paginate(6);
                return view('ajax.menufooditems',compact('FoodItem','slug'));
            }
        }else{
            $slug = 'appetizers';
            $menu_id = Menu::where('menu_slug',$slug)->first()->id;
            $FoodItem = FoodItem::where('menu_id',$menu_id)->where('extra_items',0)->where('status',1)->paginate(6);
            return view('Pages.menu',compact('FoodItem','slug'));
        }
    }

    public function menudetails( string $id){
        $food_details = FoodItem::where('slug',$id)->first();
        $related_product = FoodItem::where('menu_id',$food_details->menu_id )->where('extra_items',0)->where('status',1)->get();
        return view('Pages.details',compact('food_details','related_product'));
    }
    public function post_menu_data(Request $request){
        dd($request->all());

    }
}
