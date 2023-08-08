@extends('layouts.app')
@section('title', 'Cart')
@section('frontcontent')
<div class="wraper">
      <section
        class="inner_bannner bg_style"
        style="background-image: url({{asset('frontend/img/contact_banner.png')}})"
      >
        <div class="about_banner_section">
          <div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h1>Cart</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="shopping_cart py_8">
        <div class="container">
            <div class="tittle_heading">
                <h2>Shopping Cart</h2>
                <div class="breadcumb_main" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <div class="shoping_main_top">
                        <div class="shopping_items_main">
                            <ul class="shopping_items">
                                <li>
                                    <div class="shoping_imge">
                                        <img src="{{asset('frontend/img/17.webp')}}" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="shoping_datas">
                                        <h6>Rey Nylon Backpack</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="shop_item_quantity">
                                        <form id='myform' method='POST' class='quantity' action='#'>
                                            <input type='button' value='-' class='qtyminus minus' field='quantity' />
                                            <input type='text' name='quantity' value='1' class='qty' />
                                            <input type='button' value='+' class='qtyplus plus' field='quantity' />
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="shope_price">
                                        <div class="shope_p_tag"><span class="text-green-500 !leading-none">$74</span>
                                        </div>

                                        <div class="remove_price">
                                            <a class="theme_btn" href="">remove</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-5">
                    <div class="order_summary">
                        <div class="tittle_heading">
                            <h6> Order Summary </h6>
                        </div>
                        <ul class="summary_main">
                            <li>
                                <div class="s_subtotal">
                                    <p>Subtotal
                                    </p>
                                </div>

                                <div class="s_total">
                                    <p>$249.00
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="s_subtotal">
                                    <p>Subtotal
                                    </p>
                                </div>

                                <div class="s_total">
                                    <p>$249.00
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="s_subtotal">
                                    <p>Subtotal
                                    </p>
                                </div>

                                <div class="s_total">
                                    <p>$249.00
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <div class="order_totals d-flex align-items-center justify-content-between">
                            <div class="order_totalses">
                                <p>Subtotal
                                </p>
                            </div>

                            <div class="order_totalse">
                                <p>$249.00
                                </p>
                            </div>
                        </div>
                        <div class="cart_btn">
                            <input class="theme_btn" type="button" value="Checkout">
                        </div>
                    </div>
                </div>
            </div>

            <div class="product_c_main">
                <div class="tittle_heading">
                    <h6>Extras</h6>
                </div>

            <div class="product_checkout">
                <div class="product_box">
                    <div class="product_img">
                        <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>
                <div class="product_box">
                    <div class="product_img">
                        <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>
                <div class="product_box">
                    <div class="product_img">
                        <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>
                <div class="product_box">
                    <div class="product_img">
                        <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>
                <div class="product_box">
                    <div class="product_img">
                        <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>
                <div class="product_box">
                    <div class="product_img">
                        <img src="{{asset('frontend/img/food-1.png')}}" alt="">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </section>

@endsection
