@extends('layouts.app')
@section('title', 'Cart')
@section('frontcontent')
    <div class="wraper">
        <section class="shopping_cart py_8">
            <div class="container">
                <div class="tittle_heading">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-lg-8" id="cart_messages">
                        @php  $subtotal = 0; @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp

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
                                                    <div class="shope_p_tag"><span class="text-green-500 !leading-none">{{setting('site_currency')}}{{ $details['productdetails']->price}}</span>
                                                    </div>
                                                    <div class="price"><h6> <span id="product_quantity_price__{{$id}}">{{setting('site_currency')}}{{  round($details['productdetails']->price  * $details["quantity"] ,2)   }}</span></h6></div>

                                                    <div class="remove_price">
                                                        <input type="hidden" name="delete_ajax_url" id="delete_ajax_url" value="{{ route('cart.delete' ,$id) }}">
                                                        <a class="theme_btn" href="javascript:void(0)" id ="remove_add_to_Cart" produc_id ="{{ $id }}">Remove</a>
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
                                            <p>{{ setting('site_currency')}}{{ $subtotal }}</p>
                                        </div>
                                    </li>
                                    @php
                                        $orderType = session('order_type');
                                    @endphp
                                    @if($orderType == 'delivery')
                                        <li>
                                            <div class="s_subtotal">
                                                <p>Delivery Charges :
                                                </p>
                                            </div>
                                            <div class="s_total" id="subtotal">
                                                <p>{{ setting('site_currency')}}{{(setting('delivery_charge'))}}</p>
                                            </div>
                                        </li>
                                    @endif
                                    <li>

                                        <div class="s_subtotal">
                                            <p>Tax ({{setting('tax' ,0.00)}}%)
                                            </p>
                                        </div>
                                        <div class="s_total" id="tax_total">
                                            @php
                                                $subTotal_Tax = (session('order_type') == 'delivery') ? $subtotal + setting('delivery_charge' ,0.00) : $subtotal + 0.00;
                                                $tax_total = round(($subTotal_Tax * setting('tax' ,0.00)) / 100 ,2);
                                            @endphp
                                            <p>{{ setting('site_currency')}}{{ $tax_total }}</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="order_totals d-flex align-items-center justify-content-between">
                                    <div class="order_totalses">
                                        <p>Total
                                        </p>
                                    </div>
                                    <div class="order_totalse" id="total">
                                        <input type="hidden" name="dilavery_charge" id="dilavery_charge" value="{{ (session('order_type') == 'delivery') ? setting('delivery_charge' ,0.00) : $subtotal + 0.00 }}">
                                        <p>{{ setting('site_currency')}}{{ (session('order_type') == 'delivery') ? $subtotal + setting('delivery_charge' ,0.00) +  $tax_total : $subtotal + 0.00 +  $tax_total }}
                                        </p>
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    @if(session('order_type'))
                                        <a href="{{url('user/login')}}" class="theme_btn">Proceed To Checkout</a>
                                    @else
                                        <a href="javascript:void(0)" class="theme_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Proceed To Checkout</a>
                                        @include('layouts.partials.order_popup')
                                    @endif
                                </div>
                            </div>
                    </div>
                    @endif
                </div>
                @if(session('cart'))
                    @if (isset($extra_items) && count($extra_items) >0)
                        <input type="hidden" name="cart_ajx_url" id="cart_ajx_url" value="{{ route('cart.extra_items') }}">

                        <div class="product_c_main">
                            <div class="tittle_heading">
                                <h6>Extra Items</h6>
                            </div>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link active" id="Bread-tab" menu_id = "6">Bread</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link" id="Rice-tab"  menu_id = "5">Rice</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link" id="Drinks-tab"  menu_id = "9" >Drinks</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link" id="Chutney-tab" menu_id = "7" >Chutney</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                            </div>
                        </div>
            </div>
    </div>
    @endif
    @endif
    </section>

@endsection
