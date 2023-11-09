@php $key = 1; $subtotal =0; @endphp
@foreach(session('cart') as $id => $details)
    @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp
@endforeach
<div class="row summary mb-4">
    <div class="col-sm-12 text-left">
        <div class="payment accordion radio-type mt-3">
            <div class="summary-subtitle">Payment Methods</div>
            <div class="payment_form payment_method">
                <ul class="payment-metho-radio d-flex">
                    <li>
                        <div class="radio-item_1">
                            <input id="pay_on_delivery"   value="Pay On  Delivery"  class="payment_option" name="payment_method" type="radio" {{ old('payment_method') == 'pay_on_delivery' ? 'checked' : '' }} checked>
                            <label for="pay_on_delivery" class="radio-label_1">Pay In Delivery</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio-item_1">
                            <input id="payonline"   value="Pay On Online (Stripe)" class="payment_option"  name="payment_method" type="radio" {{ old('payment_method') == 'payonline' ? 'checked' : '' }}>
                            <label for="payonline" class="radio-label_1">Pay Online</label>
                        </div>
                    </li>
                    <span id="payment_method_error" class="text-danger"></span>
                </ul>

                <div class="{{ checkUser()==='mobile' ? 'secure_image_mobile' : 'secure_image' }}">
                    <img class ="images"src="{{ asset('frontend/img/secure-stripe-payment-logo.png')}}">
                </div>
            </div>
            <div class="payment">
                <div class="payment-meth" data-method="stripe" id="stripe_paymnet_form" >
                    @include('ajax.checkout.stripe_credit_card_form')
                </div>
            </div>
            <div class="col-sm-12">
            <ul class="total-summary-list">
            <li class="subtotal">
              <span class="key">SUBTOTAL ({{ count((array) session('cart')) }} ITEMS): </span>
              <input type="hidden" name="sub_total" id="sub_total" value="{{ $subtotal }}">
             <span class="value" id="subtotal" subtotal ="{{ $subtotal }}"  tax="{{ round(( setting('tax' ,0.00)) ,2) }}" updated_route="{{route('cart.update_details') }}"  trypeList="checkout">{{setting('site_currency')}}{{ $subtotal }}</span>
            </li>
            @php
            $cart_session = session('coupon');
                if ($cart_session) {
                    $discount_amount = session('coupon')['discount_amount'];
                                    $coupon_code  = session('coupon')['code'];
                                    $cart_Test = (session('coupon')['cart_type'] ==='coupon') ? 'Remove Coupon' : 'Apply Coupon' ;
                                    $cart_type = (session('coupon')['cart_type'] ==='coupon') ? 'remove' : 'coupon' ;
                                    $appied_coupon = session('coupon')['cart_type'];
                                    $type = (session('coupon')['coupon']['coupon']->type =='percentage') ? '%' : setting('site_currency') ;
                                    $coupon_notice = "<b>Coupon Applied  ( ".session('coupon')['coupon']['coupon']->amount. $type .")</b>";
                } else {
                    $discount_amount= '0.00';
                                    $cart_type= 'coupon';
                                    $cart_Test = 'Apply Coupon';
                                    $coupon_code = '';
                                    $coupon_notice = '';
                                    $appied_coupon = '';
                }
            @endphp
               <li class="charges">
                <span class="key">Discount {!! $coupon_notice  !!} </span>
                <input type="hidden" name="discout_total" id="discout_total" value="{{ $discount_amount }}">
                <input type="hidden" name="coupon_code" id="coupon_code" value="{{$coupon_code }}">
                <input type="hidden" name="coupon_uuid" id="coupon_uuid" value="{{$coupon_code }}">
                <span class="value"  >{{ setting('site_currency')}}{{ $discount_amount }}</span>
            </li>
                <li class="charges">
                    <span class="key">Total </span>
                    <input type="hidden" name="total_ammount" id="total_ammount" value="{{ $subtotal - $discount_amount }}">
                    <span class="value"  id="tantamount"  totalammount ="{{ $subtotal - $discount_amount }}" >{{ setting('site_currency')}}  {{ $subtotal - $discount_amount }}</span>
                </li>
                <li class="charges">
                @php
                $subTotal_Tax = $subtotal - $discount_amount ;
                $tax_total = round(($subTotal_Tax * setting('tax' ,0.00)) / 100 ,2);
            @endphp            <span class="key">Tax </span>
            <input type="hidden" name="tax_total" id="tax_total" value="{{ $tax_total }}">
            <span class="value"  id="totaltax"  totaltax ="{{ $tax_total }}" >{{ setting('site_currency')}}{{ $tax_total }}</span>
        </li>
        @if(session('order_type') == 'delivery')
        @php
        $subtotal + session('deliveryCost') +  $tax_total;
        @endphp
        <li class="subtotal">
            <span class="key" >Delivery Charges :</span>
            <div id="deliveryCost" class="delivery_cost_typ">
            <input type="radio" id="delivery_type" class="delivery"  name="delivery_type" value="{{ round(setting('delivery_charge_within_5km' ,0.00),2) }}" {{ setting('delivery_charge_within_5km' ,0.00)  == session('deliveryCost') ? 'checked' : '' }} type="checkout" > <label for="delivery_type" >Delivery Charge (Within 5 km)</label><br>
             <input type="radio"  id="delivery_typecx"  class="delivery" name="delivery_type" value="{{ round(setting('delivery_charge_outside_5km' ,0.00),2) }}" {{ setting('delivery_charge_outside_5km' ,0.00)  == session('deliveryCost') ? 'checked' : '' }} type="checkout" > <label for="delivery_typecx">Delivery Charge (Outside 5 km-15km)</label>
             <span class="value dilevery_total" id="dilevery_total"dilevery_total="{{  session('deliveryCost' ,0.00) }}" >{{setting('site_currency')}}{{  session('deliveryCost' ,0.00) }}</span>
             <br>
            </div>
        </li>
        <li class="Delivery Tip">
            <span class="key">Tip Tour Delivery Partner  (Optional) </span>
            <span class="value" id="dilevery_tip">{{setting('site_currency')}} <input type="text"  class="" name="dilvery_tip" id="dilvery_tip" value="" maxlength="2" size="2"></span>
     </li>
        @endif
        <li class="grand-total">

            <span class="key">GRAND TOTAL:</span>

            <input type="hidden" name="grandTotal" id="grandTotal" value="{{ (session('order_type') && session('order_type') == "delivery") ?  $subtotal - $discount_amount + session('deliveryCost') +  $tax_total:   $subtotal - $discount_amount + 0.00 +  $tax_total }}">
            <span class="value" id="grandTotalammount">{{setting('site_currency')}}{{ (session('order_type') && session('order_type') == "delivery") ?  $subtotal - $discount_amount + session('deliveryCost') +  $tax_total:   $subtotal - $discount_amount + 0.00 +  $tax_total }}</span>
     </li>
            </ul>
            <ul>

            </ul>
            </div>
        </div>
    </div>

</div>
