<?php

namespace App\Http\Controllers;
use App\Models\Admin\Banner;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Homepage(){
        $banner = Banner::where(['banner_type' => 'home'])->where('status','active')->get();
        return view('Home',compact('banner'));
    }
}
