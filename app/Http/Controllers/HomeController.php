<?php

namespace App\Http\Controllers;
use App\Models\Admin\{Banner,Testimonial,Page,FoodItem,Gallery};
class HomeController extends Controller
{
    public function Homepage(){
        $banner = Banner::where(['banner_type' => 'home'])->where('status','active')->get();
        $FoodItem = FoodItem::where('extra_items',0)->where('featured',1)->where('status',1)->limit(3)->get();
        $Testimonial = Testimonial::where('status','active')->get();

        return view('Home',compact('banner','Testimonial','FoodItem'));
    }

    public function aboutus(){
        return view('Pages.about');
    }
    public function gallery(){
        return view('Pages.gallery')->with('gallery',Gallery::where('status',1)->orderBy('image_postion', 'desc')->get());

    }

    public function giftCard(){
        return view('Pages.gift-card');
    }




}
