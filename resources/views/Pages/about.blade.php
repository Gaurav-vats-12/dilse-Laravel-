@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{url('about-us')}}">
<meta name="description" content="about-us Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{url('/about-us')}}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="about-us Page">
  <meta property="og:description" content="Home Page">
  <meta property="og:image" content="">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{url('/about-us')}}">
  <meta property="twitter:domain" content="{{url('/about-us')}}">
  <meta name="twitter:title" content="Home Page">
  <meta name="twitter:description" content="about-us Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{url('/about-us')}}">
@endsection
@section('title', 'About Us')

@section('frontcontent')
<section class="inner_bannner bg_style" style="background-image: url('{{asset('frontend/img/about-banner.jpg') }}')">
        <div class="about_banner_section">
          <div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h1 class="">ABOUT US</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('layouts.partials.michelin_certificate')
      <section class="award_winning py_8">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="award_winning_txt">
                <h2>Our 2023<br>
                 <span>Award Winning</span> Best Restaurant</h2>
                 <p>2023's Best Restaurant Award Winner: A culinary masterpiece that defines excellence through exceptional flavors and unforgettable experiences.</p>
              </div>
            </div>
            <div class="col-md-6 text-center">
              <div class="award_winning_img">
                <img src="{{asset('frontend/img/awrd.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="our_achievement py_8">
        <div class="container" style=" width: unset;">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="our_achievement_img">
              <img src="{{asset('frontend/img/DSC_1332.jpg') }}" alt="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="our_achievement">
                <h2>Our Achievements</h2>
                <ul>
                <li> Highly Searched Restaurant on Google (Organically)</li>
                  <li>Consistent 5+ Ratings</li>
                  <li> Remarkable Single-Day Record of 500+ Orders Completed</li>
                  <li> Featured on BlogTO</li>
                  <li> In 2023 We Are Award Winning Best Restaurant</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="about_se about_us_indian py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 my-slider" id="about_us_page">
              <div class="about_img">
                <img src="{{asset('frontend/img/DSC_1336.jpg') }}" alt="" />
              </div>
              <div class="about_img">
                <img src="{{asset('frontend/img/DSC_1339.jpg') }}" alt="" />
              </div>
              <div class="about_img">
                <img src="{{asset('frontend/img/DSC_1345.jpg') }}" alt="" />
              </div>
              <div class="about_img">
                <img src="{{asset('frontend/img/DSC_1352.jpg') }}" alt="" />
              </div>
              <div class="about_img">
                <img src="{{asset('frontend/img/DSC_1331.jpg') }}" alt="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="about_cntnt about_under_text">
                <h3>About us Dil Se Indian Restaurant & Bar</h3>
                <h2 class="bringing">Bringing You An Authentic Indian Taste</h2>
                <p>
                  Dil se originated from Hindi language which means ‘from Heart’
                  in English. Opened in december 2019, Dil se is truly proud &
                  delighted to serve you wholeheartedly.
                </p>
                <p>
                  Our Head Chef/ Owner, Mani Panwar has a true passion for
                  cooking. He is an award winning Chef in Indian Cuisine for the
                  famous new dish “Chicken Kamashutra”.
                </p>
                <p>
                  His 25 year experience in the culinary industry is the dynamic
                  skill set that keeps him in the forefront of the culinary
                  industry.
                </p>
                <p>
                  Dil se is powered by Baba’s Hospitality services in Ontario.
                </p>
                <!-- <p>
                  Dil Se Indian adds to a street that’s teeming with unique
                  restaurants and cafes, providing not only curries and biryanis
                  to those in the neighbourhood but lots of heart.s
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="meet_chef meet_chef_about py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="meet_chef_img">
                <img src="{{asset('frontend/img/chef-1.png') }}" alt="" />
              </div>
            </div>
            <div class="col-md-7">
              <div class="meet_chef_cntnt chef_text">
                <div class="tittle_heading">
                  {{-- <h3>Our Expert Chef</h3> --}}
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

                <!-- <p>
                  Mani is not only a seasoned culinary chef he is an award
                  winning Indian cuisine very famous dish , Chicken Kamashutra ,
                  Chef whose creations are beautiful edible works of art. Now
                  owner Director of the Baba’s Hospitality Services in Toronto.
                  Dil Se originates from Hindi language which means ‘from Heart’
                  in English. Our chef, Mani Ram has learned all his cooking
                  from his mother. There fore, through Dil Se, we present you
                  the best indian food in toronto coming straight from our home
                  to yours.
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- <section class="inner_bannners bg_style py_8" style="background-image: url('{{asset('frontend/img/restudent_wine.png') }}')"> --}}
        <section class="inner_bannners bg_style py_8" style="
        ">
        <div class="container ">
          <div class="row align-items-center">
            <div class="col-md-7">
              <div class="restaurdent_update_image">
                <img src="{{asset('frontend/img/restudent.png') }}" alt="" />
              </div>
            </div>
            <div class="col-md-5">
              <div class="restudent_text">
                <h3>Our achievements</h3>
                <p>
                  Dil Se Indian is open for takeout and delivery. There are
                  floor markers. Masks are mandatory and hand sanitizer is at
                  the counter.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="our_acheivements py_8" style="background: #573d24;">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="our_acheive_image">
                <img src="{{asset('frontend/img/food-01.png') }}" alt="" />
              </div>
            </div>
            <div class="col-md-7">
              <div class="about_cntnt about_under_text">
                <h3>Our Best Services</h3>
                <h2 class="bringing">We Provide Best In Class Services</h2>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using 'Content
                  here, content here', making it look like readable English.
                </p>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using 'Content
                  here, content here', making it look like readable English.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="counter_im py_8">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="counter_crd">
                <h3>Happy Customers</h3>
                <h2 class="counter" data-value ="2000+">0+</h2>
              </div>
            </div>
            <div class="col-md-4">
              <div class="counter_crd">
                <h3>Dishes</h3>
                <h2 class="counter1" id="counter1" data-value ="200+">0+</h2>
              </div>
            </div>
            <div class="col-md-4">
              <div class="counter_crd">
                <h3>Deliveries</h3>
                <h2 class="counter" data-value ="10000+">0+</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
