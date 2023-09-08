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
                    <li>
                        <div class="radio-item_1">
                            <input id="pay_on_store"   value="Pay On Store"  class="payment_option" name="payment_method" type="radio" {{ old('payment_method') == 'pay_on_store' ? 'checked' : '' }}>
                            <label for="pay_on_store" class="radio-label_1">Pay In Store</label>
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

                <div class="secure_image">

                    <img class ="images"src="https://scanlonspharmacy.com/wp-content/uploads/2018/04/secure-stripe-payment-logo.png">
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
                        <span class="value" id="subtotal" subtotal ="{{ $subtotal }}"  tax="{{ round(( setting('tax' ,0.00)) ,2) }}">{{setting('site_currency')}}{{ $subtotal }}</span>
            </li>
            @if(session('order_type') == 'delivery')
            <li class="subtotal">
            <span class="key">Delivery Charges :</span>


                <!-- <span class="value" id="subtotal" subtotal ="{{ $subtotal }}"  tax="{{ round(( setting('tax' ,0.00)) ,2) }}">{{setting('site_currency')}}{{ $subtotal }}</span> -->
            </li>

            @endif

            </ul>
            </div>
        </div>
    </div>

</div>
