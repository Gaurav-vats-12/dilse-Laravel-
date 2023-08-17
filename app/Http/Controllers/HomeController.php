<?php

namespace App\Http\Controllers;
use App\Models\Admin\{Banner,Testimonial,Page,FoodItem,Gallery};
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

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

    /**
     * @param $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function  order_confirm($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
            return view('Pages.order-confirmation-templates');
    }


}
