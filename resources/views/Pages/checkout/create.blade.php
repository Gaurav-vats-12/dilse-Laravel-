@extends('layouts.app')
@section('title', 'Checkout')
@section('frontcontent')
<section class="checkout_page py_8">
    <div class="container">
    <form action="" method="post" class="form" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51Ivb1EKWmcMvWMrc8zHdmMdktWv8bAbywxvdNS2TzzJgq93J0u9lao33b4ScCEl3pkViZUDY9Py1JuI1uDfKtKna00a9D3UDcJ" id="payment-form" autocomplete="off"> @csrf

        <div class="main_checkout">
            <div class="checkout_form_details">
                <div class="cart_head">
                    <h3>Shopping Cart</h3>
                </div>
                <div class="checkout_change_form">
                    <div class="checkout_change_card shipment_change">
                        <div class="contact_info">
                            <div class="contact_lef">
                                <div class="contact_main">
                                    <div class="contact_icon">
                                    <img src="{{ asset('frontend/img/ship.png') }}">
                                    </div>
                                    <div class="contcat_text">
                                        <h5>Shipping Address</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment_form checkout_formms">
                        </div>
                    </div>

                    <div class="checkout_change_card payment_change">
                        <div class="contact_info">
                            <div class="contact_lef">
                                <div class="contact_main">
                                    <div class="contact_icon">
                                    <img src="{{ asset('frontend/img/ship.png') }}">
                                    </div>
                                    <div class="contcat_text">
                                        <h5>Items in your Cart</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment_form checkout_formms">

                        </div>
                                    <div class="cart-table table-responsive">
            <table class="table table-bordered">
                <thead class="text-left">
                <tr>
                    <th width="20%">Product</th>
                    <th width="50%">Description</th>
                    <th width="15%">Qty</th>
                    <th width="15%">Price</th>
                </tr>
                </thead>
                <tbody class="text-left">

                </tbody>
            </table>
</div>
 </div>
                    </div>

                    <div class="checkout_change_card payment_change">
                        <div class="contact_info">
                            <div class="contact_lef">
                                <div class="contact_main">
                                    <div class="contact_icon">
                                    <img src="{{ asset('frontend/img/ship.png') }}">
                                    </div>
                                    <div class="contcat_text">
                                        <h5>Payment Method</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment_form checkout_formms">

                        <div class="summary-checkout">
                    <button class="checkout-cta">Place Your Order</button>
                </div>
                </div>
                    </div>

                </div>

            </div>

        </div>
        </form>
    </div>
    </section>
@endsection
