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
                <!-- <div class="breadcumb_main" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </div> -->
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-7">
                @php  $subtotal = 0; @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php
                  $subtotal = $subtotal + $details["price"]
        @endphp
                    <div class="shoping_main_top">
                        <div class="shopping_items_main">
                            <ul class="shopping_items">
                                <li>
                                    <div class="shoping_imge">
                                        <img src="{{ url('/storage/products/'.$details['productdetails']->image.'') }}" alt="{{ $details['productdetails']->image}}">
                                    </div>
                                </li>
                                <li>
                                    <div class="shoping_datas">
                                        <h6>{{ $details['productdetails']->name}}</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="shop_item_quantity qty-input">
                                        <form id='myform' method='POST' class='quantity' action='#'>
                                            <input type='button' value='-' class='qtyminus minus qty-count qty-count--minus' field='quantity' quantity-type ="minus" product_oid ="{{$details['productdetails']->id}}" />
                                            <input type='text' name='quantity' min="1" max="500"  value='{{ $details["quantity"]}}' class='qty' product__price ="{{ $details['price']}}" />
                                            <input type="hidden" name="product_price" id="product_price__{{$details['productdetails']->id}}" value="{{ $details['price']}}">
                                            <input type="hidden" name="product_quntity" id="product_quntity__{{$details['productdetails']->id}}" value="1">

                                            <input type='button' value='+' class='qtyplus plus qty-count qty-count--add' quantity-type ="plus" field='quantity' product_oid ="{{ $details['productdetails']->id}}" />
                                        </form>
                                    </div>
                                    <div class="price">
            <h6>$ <span id="product_quantity_price__{{$id}}">{{ $details['price'] }}</span></h6>

      </div>
                                </li>
                                <li>
                                    <div class="shope_price">
                                        <div class="shope_p_tag"><span class="text-green-500 !leading-none">${{ $details["price"]}}</span>
                                        </div>
                                        <div class="remove_price">
                                            <a class="theme_btn" href="">remove</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
            @else
            <h4> No Cart  Items Found</h4>
            @endif

                </div>
                @if(session('cart'))
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
                                    <p>${{ $subtotal }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="s_subtotal">
                                    <p>Delivery Charges
                                    </p>
                                </div>

                                <div class="s_total" id="total">
                                    <p>${{ $subtotal > 50 ?  50 : 0 }}</p>
                                <!-- <p>$ @if ($subtotal == 100) {{ $subtotal +100 }}  @else{{ $subtotal  }}@endif

                                    </p> -->
                                </div>
                            </li>
                        </ul>
                        <div class="order_totals d-flex align-items-center justify-content-between">
                            <div class="order_totalses">
                                <p>Total
                                </p>
                            </div>
                            <div class="order_totalse">
                            <p>${{ $subtotal > 50 ? $subtotal + 50 : $subtotal + 0 }}</p>

                                <!-- <p>${{ $subtotal }}</p> -->
                            </div>
                        </div>
                        <div class="cart_btn">
                            <input class="theme_btn" type="button" value="Checkout">
                        </div>
                    </div>
                </div>
  @endif
            </div>
            @if (isset($extra_items) && count($extra_items) >0)
            <div class="product_c_main">
                <div class="tittle_heading">
                    <h6>Extras</h6>
                </div>

            <div class="product_checkout">

            @foreach ( $extra_items as $key => $extra_item )
                <div class="product_box">
                    <div class="product_img">
                    <img src="{{ url('/storage/products/'.$extra_item->image.'') }}" alt="{{ $extra_item->name}}">
                    </div>
                    <div class="product_cont">
                        <a href="" class="view_product">
                            <p>Add Product</p>
                        </a>
                    </div>
                </div>
                @endforeach


            </div>
            </div>
        </div>
        @endif
    </section>

@endsection
