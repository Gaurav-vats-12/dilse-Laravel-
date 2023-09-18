@extends('layouts.app')
@section('title', 'Menu')
@section('frontcontent')
<section class="video_dilse-tw">
  <div class="video_dilse_play-tw">
    <video id="home_banner_vd" width="" height="" autoplay loop muted>
      <source src="{{asset('frontend/vedio/Dil se Menu.mp4#t=13.8')}}" type="video/mp4"/>
    </video>
  </div>
</section>
    <section class="menu_main py_8">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="menu_list">
                        @foreach (Menuhelper() as $key => $menu)
                        <li class="menu_list_inner">
                                <a href="javascript:void(0)" id="menu" menu-slug ="{{ $menu->menu_slug}}" default ="6">
                                    <h3 class="active">{{ __($menu->menu_name) }}</h3>
                                    <div class="menu_icon_img">
                                        <img src="{{ asset('frontend/img/menu_icon.png') }}" alt="">
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="loader display"></div>
                    <input type="hidden" name="slug" id="slug" value="{{$slug}}">
                    <div class="menu_main_box " id="menu_data_find">
                        @include('ajax.menufooditems')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
