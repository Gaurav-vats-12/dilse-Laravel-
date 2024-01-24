@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{ route('menu', 'appetizers') }}">
<meta name="description" content="Menu Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{ route('menu', 'appetizers') }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Menu Page">
  <meta property="og:description" content="Home Page">
  <meta property="og:image" content="">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{ route('menu', 'appetizers') }}">
  <meta property="twitter:domain" content="{{ route('menu', 'appetizers') }}">
  <meta name="twitter:title" content="Home Page">
  <meta name="twitter:description" content="Menu Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{ route('menu', 'appetizers') }}">
@endsection
@section('title', 'Menu')
@section('frontcontent')
<section class="video_dilse-tw">
  <div class="video_dilse_play-tw">
    <video id="home_banner_vd" width="" height=""  autoplay muted loop playsinline >
    <source src="{{asset('frontend/vedio/DilseMenu.mp4')}}" type="video/mp4"/>
    </video>
  </div>
</section>
    <section class="menu_main py_8">
        <div class="container">
            <div class="col text-center">
                <div class="menu_sec_food">
                <h2>Menu</h2>
                </div>
               
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <ul class="menu_list">
                        @foreach (Menuhelper() as $key => $menu)
                        <li class="menu_list_inner">
                                <a href="javascript:void(0)" id="menu"  menu_uid =  "{{ $menu->id }}"  menu-slug ="{{ $menu->menu_slug}}" mobile_type = "{{checkUser()}}" default ="6">
                            <h3 class="">{{ __($menu->menu_name) }}</h3>
                                    <div class="menu_icon_img">
                                        <img src="{{ asset('frontend/img/menu_icon.png') }}" alt="">
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-9" id="{{ checkUser()==='mobile' ? 'mobile' : 'desktop' }}">
                    <div class="loader display"></div>
                    <input type="hidden" name="slug" id="slug" value="{{$slug}}">
                    <button id="refreshButton"></button>
                    <div class="menu_main_box " id="menu_data_find">
                        @include('ajax.menufooditems')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
