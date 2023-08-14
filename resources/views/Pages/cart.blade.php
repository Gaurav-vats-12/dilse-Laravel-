@extends('layouts.app')
@section('title', 'Cart')
@section('frontcontent')
<div class="wraper">
      <!--section
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
      </section-->
      <section class="shopping_cart py_8">
        <div class="container">
            <div class="tittle_heading">
                <h2>Shopping Cart</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-8" id="cart_messages">
                @php  $subtotal = 0; @endphp
                @if(session('cart'))
{{--                        @dd(session('cart'))--}}
                @foreach(session('cart') as $id => $details)
                @php
                  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp

                    <div class="shoping_main_top" id="cart_products-{{$id}}">
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
                                        <div id='myform' method='POST' class='quantity update-cart-qty'>
                                            <a  class='qtyminus minus qty-count qty-count--minus update-qty' field='quantity' quantity-type ="minus" productoid ="{{$details['productdetails']->id}}" >-</a>
                                            <input type='text' name='quantity' min="0" max="50" readonly  value='{{ $details["quantity"]}}' class='qty product-qty' product__price ="{{ $details['price']}}" />
                                            <input type="hidden" name="product_price" id="product_price__{{$details['productdetails']->id}}" value="{{ $details['price']}}">
                                            <input type="hidden" name="product_quantity" id="product_quntity__{{$details['productdetails']->id}}" value="1">
                                            <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.update') }}" >
                                            <a class='qty-plus plus qty-count qty-count--add update-qty' quantity-type ="plus" field='quantity' productoid ="{{ $details['productdetails']->id}}" >+</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="shope_price">
                                        <div class="shope_p_tag"><span class="text-green-500 !leading-none"> $ {{ $details['productdetails']->price}}</span>
                                        </div>
                                        <div class="price"><h6> <span id="product_quantity_price__{{$id}}">$ {{  round($details['productdetails']->price  * $details["quantity"] ,2)   }}</span></h6></div>

                                        <div class="remove_price">
                                            <input type="hidden" name="delete_ajax_url" id="delete_ajax_url" value="{{ route('cart.delete' ,$id) }}">
                                            <a class="theme_btn" href="javascript:void(0)" id ="remove_add_to_Cart" produc_id ="{{ $id }}">remove</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach @else <h4> No Cart  Items Found</h4>  @endif
                </div>

                <div class="col-sm-12 col-md-7 col-lg-4" id="order_details">
                    @if(session('cart'))
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

                                <div class="s_total" id="subtotal">
                                    <p>${{ $subtotal }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="s_subtotal">
                                    <p>Delivery Charges
                                    </p>
                                </div>

                                <div class="s_total" id="dilevery_total">
                                    <p >${{4.25}}</p>
                                    <input type="hidden" name="dilavery_charge" id="dilavery_charge" value="{{4.25}}">
                                </div>
                            </li>
                        </ul>
                        <div class="order_totals d-flex align-items-center justify-content-between">
                            <div class="order_totalses">
                                <p>Total
                                </p>
                            </div>
                            <div class="order_totalse" id="total">
                            <p>${{ $subtotal + 4.25 }}</p>
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
                    <h6>Extra Items</h6>
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="Bread-tab" data-bs-toggle="tab" data-bs-target="#Bread" type="button" role="tab" aria-controls="home" aria-selected="true">Bread</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Rice-tab" data-bs-toggle="tab" data-bs-target="#Rice" type="button" role="tab" aria-controls="profile" aria-selected="false">Rice</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Drinks-tab" data-bs-toggle="tab" data-bs-target="#Drinks" type="button" role="tab" aria-controls="contact" aria-selected="false">Drinks</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Chutney-tab" data-bs-toggle="tab" data-bs-target="#Chutney" type="button" role="tab" aria-controls="contact" aria-selected="false">Chutney</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="Bread" role="tabpanel" aria-labelledby="Bread-tab">
                        
                    <div class="product_checkout">
                        @foreach ( $extra_items as $key => $extra_item )
                                @if($extra_item->menu_id == 6)
                                <div class="product_box">
                                    <div class="product_img">
                                    <img src="{{ url('/storage/products/'.$extra_item->image.'') }}" alt="{{ $extra_item->name}}">
                                    </div>
                                    <div class="product_cont">
                                    <input type="hidden" name="ajax_url" id="extra_ajax_url" value="{{ route('cart.add') }}" >
                                    <input type="hidden" name="product_price" id="product_price__{{$extra_item->id}}" value="{{ $extra_item->price }}">
                                    <input type="hidden" name="product_quntity" id="product_quntity_{{$extra_item->id}}" value="1">
                                        <a href="javascript:void(0)" class="view_product theme_btn btn-block text-center add-to-cart-button" id="add_to_cart_extra" role="button" product_uid = "{{$extra_item->id }}">  <span class="add-to-cart">Add to cart</span>
                                            <span class="added-to-cart">Added to cart</span>
                                        </a>
                                    </div>
                                </div>
                                
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="Rice" role="tabpanel" aria-labelledby="Rice-tab">
                        <div class="product_checkout">
                            @foreach ( $extra_items as $key => $extra_item )
                                        @if($extra_item->menu_id == 5)
                                        <div class="product_box">
                                            <div class="product_img">
                                            <img src="{{ url('/storage/products/'.$extra_item->image.'') }}" alt="{{ $extra_item->name}}">
                                            </div>
                                            <div class="product_cont">
                                            <input type="hidden" name="ajax_url" id="extra_ajax_url" value="{{ route('cart.add') }}" >
                                        <input type="hidden" name="product_price" id="product_price__{{$extra_item->id}}" value="{{ $extra_item->price }}">
                                        <input type="hidden" name="product_quntity" id="product_quntity_{{$extra_item->id}}" value="1">
                                            <a href="javascript:void(0)" class="view_product theme_btn btn-block text-center add-to-cart-button" id="add_to_cart_extra" role="button" product_uid = "{{$extra_item->id }}">  <span class="add-to-cart">Add to cart</span>
                                                <span class="added-to-cart">Added to cart</span>
                                            </a>
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Drinks" role="tabpanel" aria-labelledby="Drinks-tab">
                        <div class="product_checkout">
                         @foreach ( $extra_items as $key => $extra_item )
                                    @if($extra_item->menu_id == 9)
                                    <div class="product_box">
                                        <div class="product_img">
                                        <img src="{{ url('/storage/products/'.$extra_item->image.'') }}" alt="{{ $extra_item->name}}">
                                        </div>
                                        <div class="product_cont">
                                        <input type="hidden" name="ajax_url" id="extra_ajax_url" value="{{ route('cart.add') }}" >
                                    <input type="hidden" name="product_price" id="product_price__{{$extra_item->id}}" value="{{ $extra_item->price }}">
                                    <input type="hidden" name="product_quntity" id="product_quntity_{{$extra_item->id}}" value="1">
                                        <a href="javascript:void(0)" class="view_product theme_btn btn-block text-center add-to-cart-button" id="add_to_cart_extra" role="button" product_uid = "{{$extra_item->id }}">  <span class="add-to-cart">Add to cart</span>
                                            <span class="added-to-cart">Added to cart</span>
                                        </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach 
                        </div>
                    </div>
                        <div class="tab-pane fade" id="Chutney" role="tabpanel" aria-labelledby="Chutney-tab"> 
                            <div class="product_checkout">
                                @foreach ( $extra_items as $key => $extra_item )
                                    @if($extra_item->menu_id == 7)
                                        <div class="product_box">
                                            <div class="product_img">
                                            <img src="{{ url('/storage/products/'.$extra_item->image.'') }}" alt="{{ $extra_item->name}}">
                                            </div>
                                            <div class="product_cont">
                                            <input type="hidden" name="ajax_url" id="extra_ajax_url" value="{{ route('cart.add') }}" >
                                        <input type="hidden" name="product_price" id="product_price__{{$extra_item->id}}" value="{{ $extra_item->price }}">
                                        <input type="hidden" name="product_quntity" id="product_quntity_{{$extra_item->id}}" value="1">
                                                <a href="javascript:void(0)" class="view_product theme_btn btn-block text-center add-to-cart-button" id="add_to_cart_extra" role="button" product_uid = "{{$extra_item->id }}">  <span class="add-to-cart">Add to cart</span>
                                                <span class="added-to-cart">Added to cart</span>
                                            </a>
                                            </div>
                                        </div>
                                    @endif
                                 @endforeach     
                            </div>
                     </div>
            

            
              


          
            </div>
        </div>
        @endif
    </section>

@endsection
