@extends('layouts.app')
@section('title', 'Home')
@section('frontcontent')
<input type="hidden" id="prevArrow" value="{{asset('frontend/img/left_arrow.png') }}">
<input type="hidden" id="nextArrow" value="{{asset('frontend/img/right_arrow.png') }}">
      <section class="video_dilse-tw">
          <!-- <video id="hello" playsinline preload>
              <source src="{{asset('frontend/vedio/dil SE ok.mp4')}}" type="video/mp4" />
          </video> -->
          <div class="video_dilse_play-tw">
          <video width="" height="" autoplay loop muted>
            <source src="{{asset('frontend/vedio/dil SE ok.mp4')}}" type="video/mp4" />


          </video>
          <div class="home-slider-main-tw">
            <div class="container">
              <div class="home-slider-content">
                <h3>Welcome to Dil se</h3>
                <h1>
                  Made With Love-<span>Served With Affection</span>
                </h1>
                <p> Your Go-to Indian Restaurant</p>
                <div class="home_slider_btn">
                  <a href="#" class="theme_btn">Book A Table</a>
                </div>
              </div>
            </div>
          </div>
          </div>
      </section>
      <section class="about_se py_8">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="about_img">
                <img src="{{asset('frontend/img/about-img.png')}}" alt="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="about_cntnt">
                <h3>About us Dil Se Indian Restaurant & BaR </h3>
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
                  <a href="#" class="theme_btn">Read More</a>
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
                  Non-Veg <img src="{{asset('frontend/img/arrow_taste.png')}}')}}" alt="" />
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
                    <img src="{{asset('frontend/img/taste-the.png')}}" alt="" />
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-Non-Veg"
                  role="tabpanel"
                  aria-labelledby="v-pills-Non-Veg-tab"
                >
                  <div class="taste_the_img">
                    <img src="{{asset('frontend/img/taste-the.png')}}" alt="" />
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-Vegetarian"
                  role="tabpanel"
                  aria-labelledby="v-pills-Vegetarian-tab"
                >
                  <div class="taste_the_img">
                    <img src="{{asset('frontend/img/taste-the.png')}}" alt="" />
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
            <div class="col-md-6">
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
            <h2>Our Popular Food Items</h2>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="best_food_crd">
                <div class="best_food_crd_img">
                  <img src="{{asset('frontend/img/food-1.png')}}" alt="" />
                </div>
                <div class="best_food_cntnt">
                  <div class="best_food_txt">
                    <h3>Samosa Channa</h3>
                    <h2>$7.99</h2>
                  </div>
                  <div class="best_food_btn">
                    <a href="#" class="theme_btn">Add To Cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="best_food_crd">
                <div class="best_food_crd_img">
                  <img src="{{asset('frontend/img/food-2.png')}}" alt="" />
                </div>
                <div class="best_food_cntnt">
                  <div class="best_food_txt">
                    <h3>Tandoori Chicken</h3>
                    <h2>$11.99</h2>
                  </div>
                  <div class="best_food_btn">
                    <a href="#" class="theme_btn">Add To Cart</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="best_food_crd">
                <div class="best_food_crd_img">
                  <img src="{{asset('frontend/img/food-2.png')}}" alt="" />
                </div>
                <div class="best_food_cntnt">
                  <div class="best_food_txt">
                    <h3>Basmati-Rice</h3>
                    <h2>$7.99</h2>
                  </div>
                  <div class="best_food_btn">
                    <a href="#" class="theme_btn">Add To Cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="meet_chef py_8">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="meet_chef_img">
                <img src="{{asset('frontend/img/chef.png')}}" alt="" />
              </div>
            </div>
            <div class="col-md-6">
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
            <div class="testimonial_slider_cntnt">
              <div class="testimonial_slider_txt">
                <p>We visited Dil Se for our anniversary and had a wonderful meal. The food was well seasoned and flavorful. The staff was very friendly and helpful as they suggested dishes based on our preferences. For dessert, we were presented with an anniversary topper and an anniversary song. It was truly a nice touch. I will definitely visit on my next trip to Canada!
                </p>
                <div class="testimonial_user">
                  <div class="testimonial_user_img">
                    <img src="{{asset('frontend/img/user-1.png')}}" alt="" />
                  </div>
                  <div class="testimonial_user_txt">
                    <h3>Kevin Ali</h3>
                    <ul>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial_slider_cntnt">
              <div class="testimonial_slider_txt">
                <p>
                One of the few Indian Restaurants that managed to get each and every dish right! Their food feels like home, is absolutely delicious and is served with so much warmth leading to an overall lovely experience! I’d recommend them in a heartbeat and will be a going back whenever I miss home.
                </p>
                <div class="testimonial_user">
                  <div class="testimonial_user_img">
                    <img src="{{asset('frontend/img/user-2.png')}}" alt="" />
                  </div>
                  <div class="testimonial_user_txt">
                    <h3>Pallak Razdan</h3>
                    <ul>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                      <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="sub_scribe py_8">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="sub_scribe_img">
                <img src="{{asset('frontend/img/subscribe_img.png')}}" alt="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="sub_scribe_txt">
                <h2>Subscribe Our Newsletter</h2>
                <p>Stay up-to-date with our latest news and updates by subscribing to our newsletter today!</p>
              </div>
              <form  class="sub_scribe_form" id="emailSubscribeForm">
              <input type="hidden" name="email_action_url" id="email_action_url"  value="{{ route('emailSubscription') }}">

                <div class="custn_input">
                  <input type="text" placeholder="Enter your email"  name="email_address"/>
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
          <form action="" class="contact_form" id="conatact_cus_form">
          <input type="hidden" name="contact_us_action_url" id="contact_us_action_url"  value="{{ route('contact-us-form') }}">
            <div class="tittle_heading">
              <h3>Reach US</h3>
              <h2>Contact Us</h2>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="custn_input">
                  <input type="text" placeholder="First name"  name="first_name"/>
                  <span id="first_name-error" class="text-danger error"></span>

                </div>
              </div>
              <div class="col-md-6">
                <div class="custn_input">
                  <input type="text" placeholder="Last name" name="last_name" />
                  <span id="last_name-error" class="text-danger error"></span>

                </div>
              </div>
              <div class="col-md-6">
                <div class="custn_input">
                  <input type="email" placeholder="E-mail"   name="email"/>
                  <span id="email-error" class="text-danger error"></span>

                </div>
              </div>
              <div class="col-md-6">
                <div class="custn_input">
                  <input type="text"  placeholder="Phone number" name="phone" />
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
