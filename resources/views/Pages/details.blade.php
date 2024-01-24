@extends('layouts.app')
@section('meta')
<meta name="title" content="{{ $food_details->name }}">
<meta name="url" content="{{ route('menudetails' , $food_details->slug)}}">
@endsection
@section('title', $food_details->name )
@section('frontcontent')
    <section class="single_product py_8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="product_image">
                        <img src="{{ url('/storage/products/' . $food_details->image . '') }}" alt="{{ $food_details->name }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product_detail">
                        <div class="product_title">
                            <h1> {{ $food_details->name }} </h1>
                        </div>
                        <div class="product_price">
                            <h2>{{ setting('site_currency') }} {{ $food_details->price }} </h2>

                        </div>
                        <div class="product_discription">
                            {!! $food_details->description !!}
                        </div>
                        <div class="best_food_btn">
                            <input type="hidden" name="product_quntity" id="product_quntity_{{ $food_details->id }}"
                                value="1">
                            <input type="hidden" name="is_spisy" id="is_spisy_{{ $food_details->id }}"
                                value="{{ $food_details->menu->menu_slug == 'desserts' || $food_details->menu->menu_slug == 'drinks' || $food_details->menu->menu_slug == 'breads' ? 'true' : 'false' }}">
                            <a href="javascript:void(0)" class="theme_btn btn-block text-center add-to-cart-button"
                                id="add_to_cart" role="button" cart_ajax_url="{{ route('cart.add') }}"
                                product_uid="{{ $food_details->id }}"> <span class="add-to-cart">Add to cart</span>
                                <span class="added-to-cart">Added to cart</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="best_food py_8">
        <div class="container">
            <div class="tittle_heading">
                <h2>Related Products</h2>
            </div>
            <div class="row Product_slider">
                @if (isset($related_product) && count($related_product) > 0)
                    @foreach ($related_product as $key => $related_products)
                        <div class="col-md-4">
                            <div class="best_food_crd">
                                <a href="{{ route('menudetails', $related_products->slug) }}">
                                    <div class="best_food_crd_img">
                                        <img src="{{ url('/storage/products/' . $related_products->image . '') }}"
                                            alt="{{ $related_products->name }}">
                                    </div>
                                </a>
                                <div class="best_food_cntnt">
                                    <div class="best_food_txt">
                                        <a href="{{ route('menudetails', $related_products->slug) }}">
                                            <h3> {{ $related_products->name }}</h3>
                                        </a>

                                        <h2>{{ setting('site_currency') }}{{ $related_products->price }}</h2>
                                    </div>
                                    <div class="best_food_btn">
                                        <input type="hidden" name="product_quntity"
                                            id="product_quntity_{{ $related_products->id }}" value="1">
                                        <input type="hidden" name="is_spisy" id="is_spisy_{{ $related_products->id }}"
                                            value="{{ $related_products->menu->menu_slug == 'desserts' || $related_products->menu->menu_slug == 'drinks' || $related_products->menu->menu_slug == 'breads' ? 'true' : 'false' }}">
                                        <a href="javascript:void(0)"
                                            class="theme_btn btn-block text-center add-to-cart-button" id="add_to_cart"
                                            role="button" cart_ajax_url="{{ route('cart.add') }}"
                                            product_uid="{{ $related_products->id }}"> <span class="add-to-cart">Add to
                                                cart</span>
                                            <span class="added-to-cart">Added to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>No Related Found</h4>
                @endif

            </div>
        </div>
    </section>

@endsection
