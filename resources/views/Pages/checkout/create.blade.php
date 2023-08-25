@extends('layouts.app')
@section('title', 'Checkout')

@section('frontcontent')
    <section class="checkout_page py_8">
        <div class="container">
            <form action="{{ route('checkout.create') }}" method="post" class="woocommerce form require-validation payment_form" data-cc-on-file="false" id="payment-form" autocomplete="off" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"> @csrf
                <div class="main_checkout">
                    <div class="checkout_form_details" >
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
                                    @include('ajax.checkout.user_address')
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
                                    @include('ajax.checkout.user_product_list')
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
                                    @include('ajax.checkout.user_paymnet')

                                </div>
                                <div class="summary-checkout">
                                    <p class="checkout-info">Your personal data will used to process your order, support
                                        your experience throughout this website, and for other purposes described in our
                                        privacy policy.</p>
                                    <button class="theme_btn btn-txt" type="submit" id="submit-payment" >
                                        Place Your <strong class="font-italic">Order</strong> <span class="bx bx-right-arrow-alt float-right"></span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
