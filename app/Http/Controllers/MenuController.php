<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem,Menu};
use Illuminate\Http\Request;
class MenuController extends Controller
{
   public function menu(Request $request){
    if ($request->ajax()) {
        $slug = $request->slug;
        $menu_id = Menu::where('menu_slug',$slug)->first()->id;
        $FoodItem = FoodItem::where('menu_id',$menu_id)->paginate(12);
        return view('ajax.menufooditems',compact('FoodItem','slug'));
    }else{
        $slug = 'appetizers';
        $menu_id = Menu::where('menu_slug',$slug)->first()->id;
        $FoodItem = FoodItem::where('menu_id',$menu_id)->paginate(12);
        return view('Pages.menu',compact('FoodItem','slug'));
    }


   }


}
