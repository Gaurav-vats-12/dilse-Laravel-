@extends('layouts.app')
@section('title', 'Menu')
@section('frontcontent')
<section
        class="inner_bannner bg_style"
        style="background-image: url('{{asset('frontend/img/gift-card.jpg')}}')"
      >
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
                    @foreach ( Menuhelper() as $key => $menu )
                        <li class="menu_list_inner">
                                <a href="#">
                                <h3 class="active">{{ __( $menu->menu_name) }}</h3>
                                <div class="menu_icon_img">
                                    <img src="{{asset('frontend/img/menu_icon.png')}}" alt="">
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="menu_main_box">
                    <div class="best_food_crd">
                        <div class="best_food_crd_img">
                          <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                        </div>
                        <div class="best_food_cntnt">
                          <div class="best_food_txt">
                            <h3>Samosa Channa</h3>
                            <h2>$7.99</h2>
                          </div>
                          <div class="best_btn_food">
                            <a href="#" class="theme_btn">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                    <div class="best_food_crd">
                        <div class="best_food_crd_img">
                          <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                        </div>
                        <div class="best_food_cntnt">
                          <div class="best_food_txt">
                            <h3>Samosa Channa</h3>
                            <h2>$7.99</h2>
                          </div>
                          <div class="best_btn_food">
                            <a href="#" class="theme_btn">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                    <div class="best_food_crd">
                        <div class="best_food_crd_img">
                          <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                        </div>
                        <div class="best_food_cntnt">
                          <div class="best_food_txt">
                            <h3>Samosa Channa</h3>
                            <h2>$7.99</h2>
                          </div>
                          <div class="best_btn_food">
                            <a href="#" class="theme_btn">Add To Cart</a>
                          </div>
                        </div>
                      </div>
                    <div class="best_food_crd">
                        <div class="best_food_crd_img">
                          <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                        </div>
                        <div class="best_food_cntnt">
                          <div class="best_food_txt">
                            <h3>Samosa Channa</h3>
                            <h2>$7.99</h2>
                          </div>
                          <div class="best_btn_food">
                            <a href="#" class="theme_btn">Add To Cart</a>
                          </div>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
