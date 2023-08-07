<?php

namespace App\Http\Controllers;
use App\Models\Admin\FoodItem;
use Illuminate\Http\Request;
class MenuController extends Controller
{
   public function menu(){
    $FoodItem = FoodItem::where('status',1)->get();

    return view('Pages.menu',compact('FoodItem'));

   }
}
