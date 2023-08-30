@extends('layouts.app')
@section('title', 'Home')
@section('frontcontent')
<input type="hidden" id="prevArrow" value="{{asset('frontend/img/left_arrow.png') }}">
<input type="hidden" id="nextArrow" value="{{asset('frontend/img/right_arrow.png') }}">
<section class="video_dilse-tw">
          <div class="video_dilse_play-tw">
          <video id="home_banner_vd" width="" height="" autoplay loop muted>
            <source src="{{asset('frontend/vedio/dilSEok.mp4#t=13.8')}}" type="video/mp4" />


          </video>
          <div class="home-slider-main-tw">
            <div class="container">
              <div class="home-slider-content">
                <h3>Welcome to Dil se</h3>
                <h1>
                  Made With Love- Served With Affection
                </h1>
                <p> Your Go-to Indian Restaurant</p>
              </div>

              <div class="home_slider_btn">
                  <a href="{{route('booktable')}}" class="theme_btn">Book A Reservation</a> <a href="javascript:void(0)" class="theme_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Order Now</a>

                </div>

            </div>

          </div>
              @include('layouts.partials.order_popup')

          </div>

</section>

<!--section  class="hero_banner bg_style" style="background-image: url('{{asset('frontend/img/hero_banner-1.jpg') }}')" >
        <div class="home-slider">
            @if ($banner)
@foreach ($banner as $key=> $banner_value )

<div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h3> {!! __($banner_value->banner_title)!!}</h3>
                <h1>
                {!! __($banner_value->banner_heading)!!}
                </h1>
                <p>
                {!! __(substr_replace($banner_value->banner_discription, "", 150))!!}
                </p>
                <div class="home_slider_btn">
                  <a href="{!! __($banner_value->banner_details1)!!}" class="theme_btn">{!! __($banner_value->banner_details2)!!}</a>
                </div>
              </div>
            </div>
          </div>
@endforeach
            @endif
        </div>
      </section-->
      <!--section class="video_dilse">
          <div class="video_dilse_play">
          <video width="" height="" autoplay loop muted>
            <source src="{{asset('frontend/vedio/dil SE ok.mp4')}}" type="video/mp4" />
          </video>
          </div>
      </section-->
      <section class="about_se py_8">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
              <div class="about_img">
                <img src="{{asset('frontend/img/about-img.png')}}" alt="" />
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
              <div class="about_cntnt">
                <h3>About us Dil Se Indian Restaurant & Bar</h3>
                <h2>Bringing You An Authentic Indian Taste</h2>
                <p>
                  Craving for homemade Indian food? Dil Se brings you the taste
                  you’ve been missing living away from home. Our dine-in
                  restaurant in Toronto offers a menu of authentic and freshly
                  prepared North Indian delicacies. With great Punjabi Dhaba
                  style cooking, our chef uses seasonal herbs and rich spices to
                  create a culinary delight that satisfies your taste buds.
                </p>
                <div class="about_cntnt_bn">
                  <a href="{{url('about-us')}}" class="theme_btn">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="taste_the py_8">
        <div class="container">
          <div class="tittle_heading">
            <h3>Taste The Best</h3>
            <h2>
              From appetizers to tandoori snacks and vegetarian dishes to halal
              meat, we have everything on our menu.
            </h2>
          </div>
          <div class="custm_nav_pills">
            <div class="d-flex align-items-center">
              <div
                class="nav flex-column nav-pills"
                id="v-pills-tab"
                role="tablist"
                aria-orientation="vertical"
              >
                <button
                  class="nav-link active"
                  id="v-pills-Appetizers-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#v-pills-Appetizers"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-Appetizers"
                  aria-selected="true"
                >
                  Appetizers <img src="{{asset('frontend/img/arrow_taste.png')}}" alt="" />
                </button>
                <button
                  class="nav-link"
                  id="v-pills-Non-Veg-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#v-pills-Non-Veg"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-Non-Veg"
                  aria-selected="false"
                >
                  Non-Veg <img src="{{asset('frontend/img/arrow_taste.png')}}" alt="" />
                </button>
                <button
                  class="nav-link"
                  id="v-pills-Vegetarian-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#v-pills-Vegetarian"
                  type="button"
                  role="tab"
                  aria-controls="v-pills-Vegetarian"
                  aria-selected="false"
                >
                  Vegetarian <img src="{{asset('frontend/img/arrow_taste.png')}}" alt="" />
                </button>
              </div>
              <div class="tab-content" id="v-pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="v-pills-Appetizers"
                  role="tabpanel"
                  aria-labelledby="v-pills-Appetizers-tab"
                >
                  <div class="taste_the_img">
                    <img src="{{asset('frontend/img/Appetizers.png')}}" alt="" />
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-Non-Veg"
                  role="tabpanel"
                  aria-labelledby="v-pills-Non-Veg-tab"
                >
                  <div class="taste_the_img">
                    <img src="{{asset('frontend/img/Non-Veg.png')}}" alt="" />
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-Vegetarian"
                  role="tabpanel"
                  aria-labelledby="v-pills-Vegetarian-tab"
                >
                  <div class="taste_the_img">
                    <img src="{{asset('frontend/img/Vegetarian.png')}}" alt="" />
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
            <div class="col-md-3">
              <ul class="_service_list">
                <li>
                  <div class="our_servics_crd">
                    <div class="our_servics_crd_img">
                      <img src="{{asset('frontend/img/services-1.png')}}" alt="" />
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
                      <img src="{{asset('frontend/img/take-out.png')}}" alt="" />
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
                <img src="{{asset('frontend/img/services-img.png')}}" alt="" />
              </div>
            </div>
            <div class="col-md-3">
              <ul class="_service_list">
                <li>
                  <div class="our_servics_crd">
                    <div class="our_servics_crd_img">
                      <img src="{{asset('frontend/img/Delivery-1.png')}}" alt="" />
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
                      <img src="{{asset('frontend/img/Catering.png')}}" alt="" />
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
      <section class="order_online bg_style py_8" style="background-image: url('{{asset('frontend/img/order-online.jpg')}}')">
        <div class="container">
          <div class="tittle_heading">
            <h3>Order Online</h3>
            <h2>Our Service PArtner</h2>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="order_online_crd">
                <div class="order_online_img">
                  <img src="{{asset('frontend/img/uber-1.png')}}" alt="" />
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="order_online_crd">
                <div class="order_online_img">
                  <img src="{{asset('frontend/img/skip-1.png')}}" alt="" />
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="order_online_crd">
                <div class="order_online_img">
                  <img src="{{asset('frontend/img/ritual-1.png')}}" alt="" />
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="order_online_crd">
                <div class="order_online_img">
                  <img src="{{asset('frontend/img/doordash.png')}}" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="best_food py_8">
        <div class="container">
          <div class="tittle_heading">
            <h3>Best Food Items</h3>
            <h2>Popular deals</h2>
          </div>
          <div class="row">
          @if (isset($FoodItem) && count($FoodItem) >0)
          @foreach ( $FoodItem as $key => $FoodItemValue )
            <div class="col-md-4">
              <div class="best_food_crd">
                <div class="best_food_crd_img">
                <img src="{{ url('/storage/products/'.$FoodItemValue->image.'') }}" alt="{{ $FoodItemValue->image}}">
                </div>
                <div class="best_food_cntnt home_best_food_cntnt">
                  <div class="best_food_txt">
                  <a href="{{ route('menudetails' , $FoodItemValue->slug)}}"><h3> {{ $FoodItemValue->name}}</h3></a>
                  <h2>{{setting('site_currency')}} {{ $FoodItemValue->price}}</h2>
                  </div>
                  <div class="best_food_btn">
                  <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.add') }}" >
                  <input type="hidden" name="product_price" id="product_price__{{$FoodItemValue->id}}" value="{{ $FoodItemValue->price }}">
                    <input type="hidden" name="product_quntity" id="product_quntity_{{$FoodItemValue->id}}" value="1">
                        <a href="javascript:void(0)" class="theme_btn btn-block text-center add-to-cart-button" id="add_to_cart" role="button" product_uid = "{{$FoodItemValue->id }}">  <span class="add-to-cart">Add to cart</span>
                            <span class="added-to-cart">Added to cart</span>
                        </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <h4>No Food Feature  Item  Found</h4>
@endif

          </div>
        </div>
      </section>
      <section class="meet_chef py_8">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
              <div class="meet_chef_img">
                <img src="{{asset('frontend/img/chef-1.png')}}" alt="" />
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
              <div class="meet_chef_cntnt">
                <div class="tittle_heading">
                  <h3>Our Expert Chef</h3>
                  <h2>Meet Our Expert Chef</h2>
                </div>
                <p>
                  Mani is one of those Chefs that truly have a passion for
                  Authentic North Indian cuisine. With five years’ experience is
                  the culinary industry and 25 years’ experience in corporate
                  sales and training in the hospitality industry, it’s this
                  dynamic skill set that keeps his in the forefront of the
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
<section class="testimonial_sec bg_style py_8" style="background-image: url('{{asset('frontend/img/testi_monial.png')}}')" >
    <div class="container">
        <div class="tittle_heading">
            <h3>Testimonials</h3>
            <h2>What’s our Client say about Us</h2>
        </div>
        <div class="testimonial_slider">
            @if ($Testimonial)
                @foreach ($Testimonial as $key => $TestimonialValue )
            <div class="testimonial_slider_cntnt">
                <div class="testimonial_slider_txt">
                    <p class="content"  id="post-content">{!! __($TestimonialValue->testimonial_description) !!}</p>
                    <a href="javascript:void(0)" class="read-more">Read More</a>
                    <div class="testimonial_user">
                        <div class="testimonial_user_img">
                            <img src="{{ url('/storage/testimonial/'.$TestimonialValue->testonomailsImage.'')}}" alt="" />
                        </div>
                        <div class="testimonial_user_txt">
                            <h3>{!! __($TestimonialValue->custumber_name) !!}</h3>
                            <ul>
                                @for($i=1; $i<=$TestimonialValue->rating; $i++)  <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li> @endfor
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
                <img src="{{asset('frontend/img/subscribe_img.png')}}" alt="" />
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
              <div class="sub_scribe_txt">
                <h2>for special offers and newsletters</h2>
                <p>Stay up-to-date with our latest news and updates by subscribing to our newsletter today!</p>
              </div>
              <form  class="sub_scribe_form" id="emailSubscribeForm" method="POST">
              <input type="hidden" name="email_action_url" id="email_action_url"  value="{{ route('emailSubscription') }}">

                <div class="custn_input">
                  <input type="text" placeholder="Enter your email"  id="email_address" name="email_address" />
                  <span id="email_address-error" class="text-danger error"></span>
                </div>
                <div class="sub_scribe_form_btn">
                  <button class="theme_btn">Subscribe Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section class="contact_sec bg_style" style="background-image: url('{{asset('frontend/img/contact_bkg.jpg')}}')" >
        <div class="container">
          <form method="POST" class="contact_form" id="conatact_cus_form">
          <input type="hidden" name="contact_us_action_url" id="contact_us_action_url"  value="{{ route('contact-us-form') }}">
            <div class="tittle_heading">
              <h3>Reach US</h3>
              <h2>Contact Us</h2>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                <div class="custn_input">
                  <input type="text" placeholder="First name"  name="first_name"/>
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
                  <input type="email" placeholder="E-mail"   name="email"/>
                  <span id="email-error" class="text-danger error"></span>

                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                <div class="custn_input">
                  <input type="tel"  placeholder="Phone number" name="phone" id="phone" maxlength="10" />
                  <span id="phone-error" class="text-danger error"></span>
                  <span id="phone-error" class="text-danger error"></span>

                </div>
              </div>
              <div class="col-md-12">
                <div class="custn_input">
                  <textarea
                  name="message"
                    id=""
                    cols="30"
                    rows="6"
                    placeholder="Message"

                  ></textarea>
                  <span id="message-error" class="text-danger error"></span>

                </div>
              </div>
            </div>
            <div class="contact_form_btn">
              <button class="theme_btn">Send</button>
            </div>
          </form>
        </div>
      </section>
@endsection
