@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{url('contact-us')}}">
<meta name="description" content="contact-us Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{url('/contact-us')}}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="contact-us Page">
  <meta property="og:description" content="contact-us Page">
  <meta property="og:image" content="">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{url('/contact-us')}}">
  <meta property="twitter:domain" content="{{url('/contact-us')}}">
  <meta name="twitter:title" content="Home Page">
  <meta name="twitter:description" content="contact-us Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{url('/contact-us')}}">
@endsection
@section('title', 'Contact Us')
@section('frontcontent')
<div class="wraper">
    <section class="inner_bannner bg_style" style="background-image: url({{asset('frontend/img/contact_banner.png')}})">
        <div class="about_banner_section">
            <div class="home-slider-main">
                <div class="container">
                    <div class="home-slider-content">
                        <h1>Contact US</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sight_food_location py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4 mb-5 mb-xl-0">
                <a href="javascript:void(0)" id="location" data_lication_uid="location_drag"><div class="under_location">

                    <div class="location">
                            <div class="location_img">
                            <img src="{{asset('frontend/img/location.svg')}}" alt="location.svg" />
                            </div>
                            <p>{{ setting('address') != null ? setting('address') : '' }}</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4 mb-5 mb-xl-0">
                <a href="mailto:{{ setting('site_email') != null ? setting('site_email') : '' }}">

                    <div class="location">
                        <div class="under_location">
                            <div class="location_img" >
                                <img src="{{asset('frontend/img/msg.svg')}}" alt="msg.svg" />
                            </div>
                                <p>{{ setting('site_email') != null ? setting('site_email') : '' }}</p>
                        </div>

                    </div>
                    </a>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4 mb-5 mb-xl-0">
                    <div class="location">
                        <div class="under_location">
                            <div class="location_img"  data_location_id ="location_drag">
                             <img src="{{asset('frontend/img/calling.svg')}}" alt="calling.svg" />
                            </div>
                            <p class="cntact">
                            <a href="tel:{{ setting('phone') != null ? setting('phone') : '' }}">
                                  {{ setting('phone') != null ? setting('phone') : '' }}
                                    </a>|<a href="tel:416-534-6344">416-534-6344</a> 
                       
                            
                            </p>
                        </div>

                    </div>
             
                </div>
            </div>
        </div>
    </section>

    <section class="contact_form_us py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact_img_us" id="location_drag">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65301131.98038571!2d-87.91986629730727!3d2.6146120148738166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b35487c6d8901%3A0xd40d12d1bb3c682!2sDil%20Se%20Indian%20Restaurant%20%26%20Bar!5e0!3m2!1sen!2sin!4v1693892472690!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" style="max-width: 100%;"></iframe>
                    </div>
                </div>

                <div class="col-md-6">
                    <form action="" class="contact_form" method="POST" id="conatact_cus_form">
                        <input type="hidden" name="contact_us_action_url" id="contact_us_action_url"
                            value="{{ route('contact-us-form') }}">
                        @csrf
                        <div class="tittle_heading">
                            {{-- <h3>Reach US</h3> --}}
                            <h2>Contact Us</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-xl-0">
                                <div class="custn_input">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                                        placeholder="First name" />
                                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-xl-0">
                                <div class="custn_input">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                        placeholder="Last name" />
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-xl-0">
                                <div class="custn_input">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-xl-0">
                                <div class="custn_input">
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        placeholder="Phone number" id="conatact_phone_number" />
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="col-md-12 mb-4 mb-xl-0">
                                <div class="custn_input">
                                    <textarea name="message" id="message" cols="30" rows="6"
                                        placeholder="Message">{{ old('message') }}</textarea>
                                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                        </div>
                        <div class="contact_form_btn">
                            <button type="submit" class="theme_btn btn-txt">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection
