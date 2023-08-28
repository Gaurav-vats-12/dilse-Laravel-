<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem,Menu};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthAlias;

class MenuController extends Controller
{
    public function menu(Request $request, $slug = ''){


        $order_type = session()->get('order_type');
        if ($request->ajax()) {

            $slug = $request->slug;
            $current_url = $request->current_url;
            if($current_url =='home'){
                session()->put('order_type', $request->type);
                $slug = 'appetizers';
                $menu_id = Menu::where('menu_slug',$slug)->first()->id;
                $FoodItem = FoodItem::where('menu_id',$menu_id)->where('extra_items',0)->where('status',1)->paginate(6);
                return view('Pages.menu',['FoodItem'=>$FoodItem ,'slug'=>$slug]);
            }else if ($current_url =='cart.view'){
               $authType =  AuthAlias::guard('user')->check();
                $loginroute = AuthAlias::guard('user')->check() ? route('checkout.view') : route('user.login');
                session()->put('order_type', $request->type);
                return response()->json(['code' => 200 , 'status' =>'success','url'=> $loginroute]);
            }else{
                $menu_id = Menu::where('menu_slug',$slug)->first()->id;
                $FoodItem = FoodItem::where('menu_id',$menu_id)->where('extra_items',0)->where('status',1)->paginate(6);
                return view('ajax.menufooditems',['FoodItem'=>$FoodItem ,'slug'=>$slug]);
            }
        }else{
            $menu_id = Menu::where('menu_slug',$slug)->first()->id;
            $FoodItem = FoodItem::where('menu_id',$menu_id)->where('extra_items',0)->where('status',1)->paginate(6);
            return view('Pages.menu',['FoodItem'=>$FoodItem ,'slug'=>$slug]);
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
