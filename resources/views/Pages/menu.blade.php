@extends('layouts.app')
@section('title', 'Menu')
@section('frontcontent')
<section class="video_dilse-tw">
  <div class="video_dilse_play-tw">
    <video id="home_banner_vd" width="" height=""  autoplay muted loop playsinline >
    <source src="{{asset('frontend/vedio/Dil se Menu.mp4')}}" type="video/mp4"/>
    </video>
  </div>
</section>
    <section class="menu_main py_8">
        <div class="container">
            <div class="col text-center">
                <h2>Menu</h2>
            </div>

            <div class="row">
                <div class="col-lg-3">
{{--                    @dd(checkUser())--}}
                    <ul class="menu_list">
                        @foreach (Menuhelper() as $key => $menu)
                        <li class="menu_list_inner">
                                <a href="javascript:void(0)" id="menu"  menu_uid =  {{ $menu->id }}  menu-slug ="{{ $menu->menu_slug}}" mobile_type = "{{checkUser()}}" default ="6">
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
