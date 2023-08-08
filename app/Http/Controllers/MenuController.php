<?php

namespace App\Http\Controllers;
use App\Models\Admin\{FoodItem,Menu};
use Illuminate\Http\Request;
class MenuController extends Controller
{
   public function menu( string $id){
    $menu_id = Menu::where('menu_slug',$id)->first()->id;
    $FoodItem = FoodItem::where('menu_id',$menu_id)->get();
    return view('Pages.menu',compact('FoodItem'));

   }
}
