@extends('layouts.app')
@section('title', 'Menu')
@section('frontcontent')
    <section class="inner_bannner bg_style" style="background-image: url('{{ asset('frontend/img/gift-card.jpg') }}')">
        <div class="about_banner_section">
            <div class="home-slider-main">
                <div class="container">
                    <div class="home-slider-content">
                        <h1>Menu</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="menu_main py_8">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="menu_list">
                        @foreach (Menuhelper() as $key => $menu)
                            <li class="menu_list_inner">
                            <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('fetch') }}">
                                <a href="javascript:void(0)" id="menu" menu-slug ="{{ $menu->menu_slug}}" default ="12">
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
                    <div class="menu_main_box" id="menu_data_find">
                    @if (isset($FoodItem) && count($FoodItem) >0)
                        @foreach ( $FoodItem as $key => $FoodItemValue )
                        <div class="best_food_crd">
                            <div class="best_food_crd_img">
                                <img src="{{ url('/storage/products/'.$FoodItemValue->image.'') }}" alt="">
                            </div>
                            <div class="best_food_cntnt">
                                <div class="best_food_txt">
                                    <h3>{{ $FoodItemValue->name}}</h3>
                                    <h2>${{ $FoodItemValue->price}}</h2>
                                </div>
                                <div class="best_btn_food">
                                <a href="{{ route('cart.add', $FoodItemValue->id) }}" class="theme_btn btn-block text-center" role="button">Add to cart</a>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <h4>No Food Item  Found</h4>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
