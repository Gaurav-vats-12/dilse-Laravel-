@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{url('')}}">
<meta name="description" content="Home Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{url('')}}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Home Page">
  <meta property="og:description" content="Home Page">
  <meta property="og:image" content="">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{url('')}}">
  <meta property="twitter:domain" content="{{url('')}}">
  <meta name="twitter:title" content="Home Page">
  <meta name="twitter:description" content="Home Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{url('')}}">
@endsection
@section('title', 'Home')
@section('frontcontent')
    <input type="hidden" id="prevArrow" value="{{ asset('frontend/img/left_arrow.png') }}">
    <input type="hidden" id="nextArrow" value="{{ asset('frontend/img/right_arrow.png') }}">
    <section class="video_dilse-tw">
    <div class="home_btn_sticky">    
    <div class="home_slider_btn">
                <a href="{{ route('booktable') }}" class="theme_btn">Book A Reservation</a> 
                <a href="javascript:void(0)" class="theme_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Order Now</a>
            </div>
            </div>
            @include('layouts.partials.order_popup')
        <div class="video_dilse_play-tw">
            <video id="home_banner_vd" width="" height="" autoplay muted loop playsinline>
                <source src="{{ asset('frontend/vedio/DilSe Home.mp4') }}" type="video/mp4" />
            </video>
        </div>
    </section>
    <section class="home-slider_sec">
        <div class="home-slider-content">
            <div class="container">
                <h2>
                    Made With Love- Served With Affection
                </h2>
            </div>
        </div>
    </section>
    @include('layouts.partials.michelin_certificate')
    <section class="available_on">
        <div class="gluten_free">
            <div class="container">
                <div class="row">
                    <div class="gluten_sec">

                        <ul>
                            <li>
                                <div class="gluten_txt">
                                <img src="{{asset('frontend/img/Gluten.png') }}" alt="Gluten" caption="Gluten" description="Gluten">
                                    <h2>Gluten Free</h2>
                                </div>
                            </li>
                            <li>
                                <div class="gluten_txt">
                                <img src="{{asset('frontend/img/vegan.png') }}" alt="vegan.png" caption="vegan.png" description="vegan.png">
                                    <h2>VEGAN</h2>
                                </div>
                            </li>
                            <li>
                                <div class="gluten_txt">
                                <img src="{{asset('frontend/img/jain.png') }}" alt="jain.png" caption="jain.png" description="jain.png">
                                    <h2>JAIN FOOD</h2>
                                </div>
                            </li>
                            <li>
                                <div class="gluten_txt">
                                <img src="{{asset('frontend/img/halal.png') }}" alt="halal.png" caption="halal.png" description="halal.png">
                                    <h2>100% HALAAL</h2>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_se about_home_txt py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="about_cntnt text-center">
                        <h3>Welcome to Dil Se Indian Restaurant & Bar</h3>
                        <h2>Bringing You An Authentic Indian Taste</h2>
                        <p>Craving for homemade Indian food? Dil Se brings you the taste you’ve been missing living away
                            from home. Our dine-in restaurant in Toronto offers a menu of authentic and freshly prepared
                            North Indian delicacies. With great Punjabi Dhaba style cooking, our chef uses seasonal herbs
                            and rich spices to create a culinary delight that satisfies your taste buds.</p>
                        <div class="about_cntnt_bn text-center">
                            <a href="{{ url('about-us') }}" class="theme_btn">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="taste_the py_8">
        <div class="container">
            <div class="tittle_heading taste_the_best">
                <h3>Taste The Best</h3>
                <h2>
                    From appetizers to tandoori snacks and vegetarian dishes to halal
                    meat, <span class="we_ever">we have everything on our menu.</span>
                </h2>
            </div>
            <div class="custm_nav_pills">
                <div class="d-flex align-items-center">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-Appetizers-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Appetizers" type="button" role="tab"
                            aria-controls="v-pills-Appetizers" aria-selected="true">
                            Appetizers <img src="{{ asset('frontend/img/arrow_taste.png') }}" alt="" />
                        </button>
                        <button class="nav-link" id="v-pills-Non-Veg-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Non-Veg" type="button" role="tab" aria-controls="v-pills-Non-Veg"
                            aria-selected="false">
                            Non-Veg <img src="{{ asset('frontend/img/arrow_taste.png') }}" alt="" />
                        </button>
                        <button class="nav-link" id="v-pills-Vegetarian-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Vegetarian" type="button" role="tab"
                            aria-controls="v-pills-Vegetarian" aria-selected="false">
                            Vegetarian <img src="{{ asset('frontend/img/arrow_taste.png') }}" alt="" />
                        </button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-Appetizers" role="tabpanel"
                            aria-labelledby="v-pills-Appetizers-tab">
                            <div class="taste_the_img">
                                <img src="{{ asset('frontend/img/Appetizers.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-Non-Veg" role="tabpanel"
                            aria-labelledby="v-pills-Non-Veg-tab">
                            <div class="taste_the_img">
                                <img src="{{ asset('frontend/img/Non-Veg.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-Vegetarian" role="tabpanel"
                            aria-labelledby="v-pills-Vegetarian-tab">
                            <div class="taste_the_img">
                                <img src="{{ asset('frontend/img/Vegetarian.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_servics py_8">
        <div class="container">
            <div class="tittle_heading">
                <h3>Our services</h3>
                <h2>We Provide Best In Class Services</h2>
            </div>
            <div class="row">
                <div class=" col-md-12 col-lg-3">
                    <ul class="_service_list">
                        <li>
                            <div class="our_servics_crd">
                                <div class="our_servics_crd_img">
                                    <img src="{{ asset('frontend/img/services-1.png') }}" alt="services-1.png" />
                                </div>
                                <div class="our_servics_txt">
                                    <h2>Dine-in</h2>
                                    <p>
                                        We always love to see you in person, ensuring to make
                                        your dining experience always top-notch with a perfect
                                        ambiance.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="our_servics_crd">
                                <div class="our_servics_crd_img">
                                    <img src="{{ asset('frontend/img/take-out.png') }}" alt="take-out.png" />
                                </div>
                                <div class="our_servics_txt">
                                    <h2>Take Out</h2>
                                    <p>
                                        If you want to munch on your favourite Indian food at
                                        the comfort of home, order a take-out meal from us
                                        today.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                    <div class="our_servics_img">
                        <img src="{{ asset('frontend/img/services-img.png') }}" alt="services-img.png" />
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <ul class="_service_list">
                        <li>
                            <div class="our_servics_crd">
                                <div class="our_servics_crd_img">
                                    <img src="{{ asset('frontend/img/Delivery-1.png') }}" alt="Delivery-1.png" />
                                </div>
                                <div class="our_servics_txt">
                                    <h2>Delivery</h2>
                                    <p>
                                        We have worked to package and deliver our meals in a way
                                        that lets you bring the quality of our meals into your
                                        home.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="our_servics_crd">
                                <div class="our_servics_crd_img">
                                    <img src="{{ asset('frontend/img/Catering.png') }}" alt="Catering.png" />
                                </div>
                                <div class="our_servics_txt">
                                    <h2>Catering</h2>
                                    <p>
                                        No matter, which special occasion it is, we serve
                                        perfectly cooked and delicious Indian cuisine for
                                        parties and events.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="order_online bg_style py_8"
        style="background-image: url('{{ asset('frontend/img/order-online.jpg') }}')">
        <div class="container">
            <div class="tittle_heading our_title_head">
                <h3>Order Online</h3>
                <h2>Our Service Partner</h2>
            </div>
            <div class="row ourServices">
                <div class="col-md-3">
                    <div class="order_online_crd">
                        <div class="order_online_img">
                            <img src="{{ asset('frontend/img/uber.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="order_online_crd">
                        <div class="order_online_img">
                            <img src="{{ asset('frontend/img/skip.png') }}" alt="UberEates" title="UberEates" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="order_online_crd">
                        <div class="order_online_img">

                            <img src="{{ asset('frontend/img/ritual.png') }}" alt="skipthedishes"
                                title="skipthedishes" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="order_online_crd">
                        <div class="order_online_img">
                            <img src="{{ asset('frontend/img/door.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="best_food py_8">
        <div class="container">
            <div class="tittle_heading">
                <!-- <h3>Best Food Items</h3> -->
                <h3>Chef's Recommendation</h3>
                <h2>Popular deals</h2>
            </div>
            <div class="row">
                @if (isset($FoodItem) && count($FoodItem) > 0)
                    @foreach ($FoodItem as $key => $FoodItemValue)
                        <div class="col-md-4 mb-2">
                            <div class="best_food_crd">
                                <a href="{{ route('menudetails', $FoodItemValue->slug) }}">
                                    <div class="best_food_crd_img">
                                        <img src="{{ url('/storage/products/' . $FoodItemValue->image . '') }}"
                                            alt="{{ $FoodItemValue->image }}">
                                    </div>
                                </a>
                                <div class="best_food_cntnt home_best_food_cntnt">
                                    <div class="best_food_txt">
                                        <a href="{{ route('menudetails', $FoodItemValue->slug) }}">
                                            <h3> {{ $FoodItemValue->name }}</h3>
                                        </a>
                                        <h2>{{ setting('site_currency') }} {{ $FoodItemValue->price }}</h2>
                                    </div>
                                    <div class="best_food_btn">
                                        <input type="hidden" name="product_quntity"
                                            id="product_quntity_{{ $FoodItemValue->id }}" value="1">
                                        <input type="hidden" name="is_spisy" id="is_spisy_{{ $FoodItemValue->id }}"
                                            value="{{ $FoodItemValue->menu->menu_slug == 'desserts' || $FoodItemValue->menu->menu_slug == 'drinks' || $FoodItemValue->menu->menu_slug == 'breads' ? 'true' : 'false' }}">
                                        <a href="javascript:void(0)"
                                            class="theme_btn btn-block text-center add-to-cart-button" id="add_to_cart"
                                            role="button" cart_ajax_url="{{ route('cart.add') }}"
                                            product_uid="{{ $FoodItemValue->id }}"> <span class="add-to-cart">Add to
                                                cart</span>
                                            <span class="added-to-cart">Added to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>No Food Feature Item Found</h4>
                @endif

            </div>
        </div>
    </section>
    <section class="meet_chef meet_home_chef py_8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 mb-4 mb-xl-0">
                    <div class="meet_chef_img">
                        <img src="{{ asset('frontend/img/chef-1.png') }}" alt="" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7 mb-4 mb-xl-0">
                    <div class="meet_chef_cntnt">
                        <div class="tittle_heading">
                            <!-- <h3>Our Expert Chef</h3> -->
                            <h2>Meet Our Expert Chef</h2>
                        </div>
                        <p>
                            Mani is one of those Chefs that truly have a passion for
                            Authentic North Indian cuisine. With five years’ experience is
                            the culinary industry and 25 years’ experience in corporate
                            sales and training in the hospitality industry, it’s his
                            dynamic skill set that keeps him in the forefront of the
                            culinary industry. Mani .worked as Head Chef at Bombay Bhel
                            Indian restaurant & bar.
                        </p>
                        <div class="meet_chef_btn">
                            <a href="#" class="theme_btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial_sec bg_style py_8"
        style="background-image: url('{{ asset('frontend/img/testi_monial.png') }}')">
        <div class="container">
            <div class="tittle_heading">
                <h3>Testimonials</h3>
                <h2>What’s our Client say about Us</h2>
            </div>
            <div class="testimonial_slider">
                @if ($Testimonial)
                    @foreach ($Testimonial as $key => $TestimonialValue)
                        <div class="testimonial_slider_cntnt">
                            <div class="testimonial_slider_txt">
                                <p class="content" id="post-content">{!! __($TestimonialValue->testimonial_description) !!}</p>
                                <a href="javascript:void(0)" class="read-more">Read More</a>
                                <div class="testimonial_user">
                                    <div class="testimonial_user_img">
                                        <img src="{{ url('/storage/testimonial/' . $TestimonialValue->testonomailsImage . '') }}" alt="{{ $TestimonialValue->testonomailsImage}}" />
                                    </div>
                                    <div class="testimonial_user_txt">
                                      <a href="{!! __($TestimonialValue->google_testonomails_link) !!}" target="_blank" title="{!! __($TestimonialValue->custumber_name) !!}"><h3>{!! __($TestimonialValue->custumber_name) !!}</h3></a>  
                                        <ul>
                                            @for ($i = 1; $i <= $TestimonialValue->rating; $i++)
                                                <li><img src="{{ asset('frontend/img/stars-1.png') }}" alt="" /> </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>

        </div>
    </section>
    <section class="sub_scribe py_8">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                    <div class="sub_scribe_img">
                        <img src="{{ asset('frontend/img/subscribe_img.png') }}" alt="" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                    <div class="sub_scribe_txt">
                        <h2>for special offers and newsletters</h2>
                        <p>Stay up-to-date with our latest news and updates by subscribing to our newsletter today!</p>
                    </div>
                    <div id="mc_embed_shell">
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet"
                            type="text/css">
                        <style type="text/css">
                            #mc_embed_signup {
                                background: #fff;
                                false;
                                clear: left;
                                font: 14px Helvetica, Arial, sans-serif;
                                width: 600px;
                            }
                        </style>
                        <div>
                            <form
                                action="https://dilse.us12.list-manage.com/subscribe/post?u=ef3584d822e3060c8cdb4139f&amp;id=f13100197e&amp;f_id=0078bce0f0"
                                method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                class="validate" target="_blank">
                                <div id="mc_embed_signup_scroll">
                                    <div class="mc-field-group custn_input"><input type="email"
                                            placeholder="Enter your email" name="EMAIL" class="required email"
                                            id="mce-EMAIL" required="" value=""></div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display: none;"></div>
                                        <div class="response" id="mce-success-response" style="display: none;"></div>
                                    </div>
                                    <div aria-hidden="true" style="position: absolute; left: -5000px;"><input
                                            type="text" name="b_ef3584d822e3060c8cdb4139f_f13100197e" tabindex="-1"
                                            value=""></div>
                                    <div class="clear">
                                        <div class="sub_scribe_form_btn">
                                            <button class="theme_btn btn-txt">Subscribe Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
                        <script type="text/javascript">
                            (function($) {
                                window.fnames = new Array();
                                window.ftypes = new Array();
                                fnames[0] = 'EMAIL';
                                ftypes[0] = 'email';
                                fnames[1] = 'FNAME';
                                ftypes[1] = 'text';
                                fnames[2] = 'LNAME';
                                ftypes[2] = 'text';
                                fnames[3] = 'ADDRESS';
                                ftypes[3] = 'address';
                                fnames[4] = 'PHONE';
                                ftypes[4] = 'phone';
                                fnames[5] = 'BIRTHDAY';
                                ftypes[5] = 'birthday';
                            }(jQuery));
                            var $mcj = jQuery.noConflict(true);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact_sec bg_style" style="background-image: url('{{ asset('frontend/img/contact_bkg.jpg') }}')">
        <div class="container-fluid">
            <form method="POST" class="contact_form" id="conatact_cus_form">
                <input type="hidden" name="contact_us_action_url" id="contact_us_action_url"
                    value="{{ route('contact-us-form') }}">
                <div class="tittle_heading">
                    <h3>Reach US</h3>
                    <h2>Contact Us</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                        <div class="custn_input">
                            <input type="text" placeholder="First name" name="first_name" />
                            <span id="first_name-error" class="text-danger error"></span>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                        <div class="custn_input">
                            <input type="text" placeholder="Last name" name="last_name" />
                            <span id="last_name-error" class="text-danger error"></span>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                        <div class="custn_input">
                            <input type="email" placeholder="E-mail" name="email" />
                            <span id="email-error" class="text-danger error"></span>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                        <div class="custn_input">
                            <input type="tel" placeholder="Phone number" name="phone" id="conatact_phone_number"
                                maxlength="10" />
                            <span id="phone-error" class="text-danger error"></span>
                            <span id="phone-error" class="text-danger error"></span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custn_input">
                            <textarea name="message" id="" cols="30" rows="6" placeholder="Message"></textarea>
                            <span id="message-error" class="text-danger error"></span>

                        </div>
                    </div>
                </div>
                <div class="contact_form_btn">
                    <button class="theme_btn btn-txt">Send</button>
                </div>
            </form>
        </div>
    </section>
@endsection
