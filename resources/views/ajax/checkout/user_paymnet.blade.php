@php $key = 1; $subtotal =0; @endphp
@foreach(session('cart') as $id => $details)
    @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp
@endforeach
<div class="row summary mb-4">
    <div class="col-sm-12 text-left">
        <div class="payment accordion radio-type mt-3">
            <div class="summary-subtitle">Payment Methods</div>
            <div class="payment_form">
                <ul class="payment-metho-radio d-flex">
                    <li>
                        <div class="radio-item_1">
                            <input id="pay_on_delivery"   value="Pay On  Delivery"  class="payment_option" name="payment_method" type="radio" {{ old('payment_method') == 'pay_on_delivery' ? 'checked' : '' }} checked>
                            <label for="pay_on_delivery" class="radio-label_1">Pay In Delivery</label>
                        </div>
                    </li>
                    <!-- <li>
                        <div class="radio-item_1">
                            <input id="pay_on_store"   value="Pay On Store"  class="payment_option" name="payment_method" type="radio" {{ old('payment_method') == 'pay_on_store' ? 'checked' : '' }}>
                            <label for="pay_on_store" class="radio-label_1">Pay In Store</label>
                        </div>
                    </li> -->
                    <li>
                        <div class="radio-item_1">
                            <input id="payonline"   value="Pay On Online (Stripe)" class="payment_option"  name="payment_method" type="radio" {{ old('payment_method') == 'payonline' ? 'checked' : '' }}>
                            <label for="payonline" class="radio-label_1">Pay Online</label>
                        </div>
                    </li>
                    <span id="payment_method_error" class="text-danger"></span>
                </ul>

                <div class="secure_image">

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
            <li class="charges">
            @php $subTotal_Tax = $subtotal + 0.00;  $tax_total = round(($subTotal_Tax * setting('tax' ,0.00)) / 100 ,2); @endphp
            <span class="key">Tax </span>
            <input type="hidden" name="tax_total" id="tax_total" value="{{ $tax_total }}">
            <span class="value"  id="totaltax"  totaltax ="{{ $tax_total }}" >{{ setting('site_currency')}}{{ $tax_total }}</span>
        </li>
        @if(session('order_type') == 'delivery')
        @php
        $subtotal + session('deliveryCost') +  $tax_total;
        @endphp
        <li class="subtotal">
            <span class="key" >Delivery Charges :</span>
            @if (session('deliveryCost'))    @php $class = "deliveryCost" @endphp
            <span class="value deliveryCost" id="dilevery_total" >{{setting('site_currency')}}{{ session('deliveryCost') }}</span>
            @else
            <div id="deliveryCost">
            <input type="radio" id="delivery_type" class="delivery"  name="delivery_type" value="{{ round(setting('delivery_charge_within_5km' ,0.00),2) }}" {{ setting('delivery_charge_within_5km' ,0.00)  == session('deliveryCost') ? 'checked' : '' }} type="checkout" > <label for="delivery_type" >Delivery Charge (Within 5 km)</label><br>
             <input type="radio"  id="delivery_typecx"  class="delivery" name="delivery_type" value="{{ round(setting('delivery_charge_outside_5km' ,0.00),2) }}" {{ setting('delivery_charge_outside_5km' ,0.00)  == session('deliveryCost') ? 'checked' : '' }} type="checkout" > <label for="delivery_typecx">Delivery Charge (Outside 5 km-15km)</label> <br>
             </div>
             <span class="value" id="dilevery_total" >{{setting('site_currency')}}0.00</span>

            @endif

        </li>
        @endif
        <li class="grand-total">
            <span class="key">GRAND TOTAL:</span>
            <span class="value" id="grandTotal">{{setting('site_currency')}}{{ (session('order_type') && session('order_type') == "delivery") ? $subtotal + session('deliveryCost') +  $tax_total:  $subtotal + 0.00 +  $tax_total }}</span>
     </li>
            </ul>
            </div>
            <input type="hidden" name="tototal_amount" value="{{ (session('order_type') && session('order_type') == "delivery") ? $subtotal + session('deliveryCost') +  $tax_total:  $subtotal + 0.00 +  $tax_total }}">

        </div>
    </div>

</div>
