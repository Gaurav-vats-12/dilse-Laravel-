@extends('layouts.app')
@section('title', 'Cart')
@section('frontcontent')
    <section class="shopping_cart py_8">
        <div class="container">
            <div class="tittle_heading">
                <h2>Shopping Cart</h2>
            </div>
            <div id="minimum_order_message"></div>
            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-8" id="cart_messages">
                    @php  $subtotal = 0; @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp
                            <div class="shoping_main_top" id="cart_products-{{$id}}">
                                <div class="shopping_items_main">
                                    <ul class="shopping_items" data-custom-attr="{{ $details['is_spisy']}}">
                                        <li>
                                            <div class="shoping_imge">
                                                <img src="{{ url('/storage/products/'.$details['image'].'') }}"
                                                     alt="{{ $details['image']}}">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shoping_datas">
                                                <h6>{{ $details['name']}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shop_item_quantity qty-input">
                                                <div id='myform' method='POST' class='quantity update-cart-qty'>
                                                    <a class='qtyminus minus qty-count qty-count--minus update-qty'
                                                       field='quantity' quantity-type="minus" productoid="{{$id}}">-</a>
                                                    <input type='text' name='quantity' min="0" max="50" readonly
                                                           value='{{ $details["quantity"]}}' class='qty product-qty'
                                                           product__price="{{ $details['price']}}"/>
                                                    <input type="hidden" name="product_price"
                                                           id="product_price__{{$id}}" value="{{ $details['price']}}">
                                                    <input type="hidden" name="product_quantity"
                                                           id="product_quntity__{{$id}}" value="1">
                                                    <input type="hidden" name="ajax_url" id="ajax_url"
                                                           value="{{ route('cart.update') }}">
                                                    <a class='qty-plus plus qty-count qty-count--add update-qty'
                                                       quantity-type="plus" field='quantity' productoid="{{ $id}}">+</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shope_price">
                                                <div class="shope_p_tag"><span
                                                        class="text-green-500 !leading-none">{{setting('site_currency')}}{{ $details['price']}}</span>
                                                </div>
                                                <div class="price"><h6><span
                                                            id="product_quantity_price__{{$id}}">{{setting('site_currency')}}{{  round($details['price']  * $details["quantity"] ,2)   }}</span>
                                                    </h6></div>
                                                <div class="remove_price">
                                                    <form method="POST"
                                                          action="{{ route('cart.destroy', $id) }}">  @csrf @method('POST')
                                                        <input type="hidden" name="is_spicy"
                                                               value="{{ $details['is_spisy']}}">
                                                        <input type="hidden" name="delete_ajax_url" id="delete_ajax_url"
                                                               value="{{ route('cart.destroy' ,$id) }}">
                                                        <a class="theme_btn" href="javascript:void(0)"
                                                           id="remove_add_to_Cart" produc_id="{{ $id }}"
                                                           is_spicy="{{ $details['is_spisy']}}">Remove</a></form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            @if (cart_functionalty('false',session('cart')) > 0)
                                <div class="col-md-6" id="cart_functionalty">
                                    <h3>Add spice level</h3>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="spicy_lavel" id="spicy_lavel"
                                                   value="{{ session('spicy_lavel')}}" show_form="true">
                                            <div class="input-group">
                                                <select name="spicy_lavel" id="spicy_lavel" class="form-control"
                                                        ajax_value="{{ route('cart.update_details')}}"
                                                        location_Type="spicy">
                                                    <option value="">Choose Spice level</option>
                                                    @foreach(getattribute('other') as $key=> $attribuite)
                                                        <option
                                                            value="{{$attribuite->attributes_name}}" {{ $attribuite->attributes_name == session('spicy_lavel')? 'selected' : '' }}>{{ $attribuite->attributes_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="spicy_lavel" id="spicy_lavel" value="" show_form="false">
                            @endif
                        </div>
                    @else
                        <h4> No Cart Items Found</h4>
                    @endif
                </div>
                <div class="col-sm-12 col-md-7 col-lg-4" id="order_details">
                    @if(session('cart'))
                        @php
                            $cart_session = session('coupon');
                            if ($subtotal < round(( setting('minimum_order_for_delivery' ,0.00)) ,2)) {
                                $discount_amount='0.00';
                                    $cart_type= 'coupon';
                                    $cart_Test = 'Apply Coupon';
                                    $coupon_code = '';
                                    $appied_coupon = '';
                                    $coupon_notice='';
                            } else {
                                if ($cart_session  ) {
                                    $discount_amount = session('coupon')['discount_amount'];
                                    $coupon_code  = session('coupon')['code'];
                                    $cart_Test = (session('coupon')['cart_type'] ==='coupon') ? 'Remove Coupon' : 'Apply Coupon' ;
                                    $cart_type = (session('coupon')['cart_type'] ==='coupon') ? 'remove' : 'coupon' ;
                                    $appied_coupon = session('coupon')['cart_type'];
                                    $type = (session('coupon')['coupon']['coupon']->type =='percentage') ? '%' : setting('site_currency') ;
                                    $coupon_notice = "<b>Coupon Applied  ( ".session('coupon')['coupon']['coupon']->amount. $type .")</b>";

                                }  else {
                                    $discount_amount= '0.00';
                                    $cart_type= 'coupon';
                                    $cart_Test = 'Apply Coupon';
                                    $coupon_code = '';
                                    $coupon_notice = '';
                                    $appied_coupon = '';
                                }
                            }
                        @endphp
                        <div class="order_summary">
                            <div class="tittle_heading">
                                @if (Auth::guard('user')->check())
                                  <p> Applied Coupon</p>
                                <label for="coupon_code"></label><input type="text" name="coupon_code" class="input-text" id="coupon_code" value="{{ $coupon_code }}" placeholder="Coupon code">
                              <a href="javascript:void(0)" id="apply_coupon"
                                 appied_coupon="{{ $appied_coupon}}"
                                 coupon_type="{{ $cart_type}}"
                                 route_ajax="{{ route('cart.vieapply_couponw')}}">{{ $cart_Test}}</a>
                                @endif
                                <h4> Order Summary </h4>
                                <p id="message"
                                   mimimum_ammout="{{  round(( setting('minimum_order_for_delivery' ,0.00)) ,2) }}">
                                    Minimum order amount
                                    is {{ setting('site_currency')}}{{ round(( setting('minimum_order_for_delivery',0.00)) ,2) }}</p>
                                <ul class="summary_main">
                                    <li>
                                        <div class="s_subtotal">
                                            <p>Subtotal
                                            </p>
                                        </div>
                                        <div class="s_total" id="subtotal" subtotal="{{ $subtotal }}"
                                             tax="{{ round(( setting('tax' ,0.00)) ,2) }}"
                                             updated_route="{{route('cart.update_details') }}" trypeList="cart">
                                            <p id="subtotal">{{ setting('site_currency')}} {{ $subtotal }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="s_subtotal">
                                            <p>Discount {!! $coupon_notice  !!}</p>

                                        </div>
                                        <div class="s_total" id="discount_price" discountprice="{{$discount_amount}}"
                                             trypeList="cart">
                                            <p id="discount">{{ setting('site_currency')}} {{ $discount_amount}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="s_subtotal">
                                            <p>Total
                                            </p>
                                        </div>
                                        <div class="s_total" id="total_after_discount" total_after_discount="0.00"
                                             trypeList="cart">
                                            <p id="total_price_after_discount">{{ setting('site_currency')}}  {{ $subtotal - $discount_amount }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="s_subtotal">
                                            <p>Tax
                                            </p>
                                        </div>
                                        <div class="s_total" id="tax_total">
                                            @php
                                                $subTotal_Tax = $subtotal - $discount_amount ;
                                                $tax_total = round(($subTotal_Tax * setting('tax' ,0.00)) / 100 ,2);
                                            @endphp
                                            <input type="hidden" name="tax_total" id="tax_total"
                                                   value="{{ $tax_total }}">
                                            <p id="totaltax"
                                               totaltax="{{ $tax_total }}">{{ setting('site_currency')}} {{ $tax_total }}</p>
                                        </div>
                                    </li>
                                    @php
                                        $orderType = session('order_type');
                                    @endphp
                                    <input type="hidden" name="order_type" id="order_type"
                                           value="{{ session('order_type')}}">
                                    <input type="hidden" name="shipping_charge" id="shipping_charge"
                                           value="{{ session('deliveryCost') }}">
                                    @if($orderType == 'delivery')
                                        <li>
                                            <div class="s_subtotal">
                                                <p>Delivery Charges :
                                                </p>
                                                <input type="radio" type="cart" id="delivery_type" class="delivery"
                                                       name="delivery_type"
                                                       value="{{ round(setting('delivery_charge_within_5km' ,0.00),2) }}"
                                                       {{ setting('delivery_charge_within_5km' ,0.00)  == session('deliveryCost') ? 'checked' : '' }}  location_Type="delivery">
                                                <label for="delivery_type">Delivery Charge (Within 5 km)</label><br>
                                                <input type="radio" type="cart" id="delivery_typecx" class="delivery"
                                                       name="delivery_type"
                                                       value="{{ round(setting('delivery_charge_outside_5km' ,0.00),2) }}"
                                                       {{ setting('delivery_charge_outside_5km' ,0.00)  == session('deliveryCost') ? 'checked' : '' }}  location_Type="delivery">
                                                <label for="delivery_typecx">Delivery Charge (Outside 5 km-15km)</label>
                                                <br>
                                            </div>
                                            <div class="s_total" id="dilevery_total">
                                                <p>{{ setting('site_currency')}}{{  session('deliveryCost' ,0.00) }}</p>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                <div class="order_totals d-flex align-items-center justify-content-between">
                                    <div class="order_totalses">
                                        <p>Grand Total </p>
                                    </div>
                                    <input type="hidden" name="dilavery_charge" id="dilavery_charge"
                                           value="{{ (session('order_type') == 'delivery') ? session('deliveryCost') :  '' }}">
                                    <div class="order_totalse" id="grandTotal">
                                        <p>{{ setting('site_currency')}}{{ (session('order_type') == 'delivery') ? $subtotal - $discount_amount + session('deliveryCost') +  $tax_total : $subtotal - $discount_amount + 0.00 +  $tax_total }}</p>
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    @if(session('order_type'))
                                        <a href="javascript:void(0)" id="checkout_btn" class="theme_btn"
                                           login_url="{{url('user/login')}}" type="{{ session('order_type') }}">Proceed
                                            To Checkout</a>
                                    @else
                                        <a href="javascript:void(0)" id="checkout_btn" class="theme_btn"
                                           login_url="null" type=null>Proceed To Checkout</a>
                                        @include('layouts.partials.order_popup')
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if(session('cart'))
                    @if (isset($extra_items) && count($extra_items) >0)
                        <input type="hidden" name="cart_ajx_url" id="cart_ajx_url"
                               value="{{ route('cart.extra_items') }}">

                        <div class="product_c_main">
                            <div class="tittle_heading">
                                <h6>Extra Items</h6>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link active" id="Bread-tab" menu_id="6">Bread
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link" id="Rice-tab" menu_id="5">Rice</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link" id="Drinks-tab" menu_id="9">Drinks</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="extra_items nav-link" id="Chutney-tab" menu_id="7">Chutney</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                            </div>
                        </div>
            </div>
        @endif
        @endif
    </section>

@endsection
