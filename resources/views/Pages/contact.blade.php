@extends('layouts.app')
@section('title', 'Contact Us')
@section('frontcontent')
<div class="wraper">
      <section
        class="inner_bannner bg_style"
        style="background-image: url({{asset('frontend/img/contact_banner.png')}})"
      >
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
      <section class="sight_food_location">
        <div class="container py_8">
          <div class="row">
            <div class="col-md-4">
              <div class="location">
                <div class="under_location">
                  <div class="location_img">
                    <img src="{{asset('frontend/img/location.png')}}" alt="" />
                  </div>
                  <p>{{ setting('address') != null ? setting('address') : '' }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="location">
                <div class="under_location">
                  <div class="location_img">
                    <img src="{{asset('frontend/img/message.png')}}" alt="" />
                  </div>
                  <p>{{ setting('site_email') != null ? setting('site_email') : '' }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="location">
                <div class="under_location">
                  <div class="location_img">
                    <img src="{{asset('frontend/img/mobile.png')}}" alt="" />
                  </div>
                  <p>{{ setting('phone') != null ? setting('phone') : '' }}</p>
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
              <div class="contact_img_us">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65301131.98038571!2d-87.91986629730727!3d2.6146120148738166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b35487c6d8901%3A0xd40d12d1bb3c682!2sDil%20Se%20Indian%20Restaurant%20%26%20Bar!5e0!3m2!1sen!2sin!4v1693892472690!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="max-width: 100%;"></iframe>
                <!-- <img src="{{asset('frontend/img/contactimg.png')}}" alt="" /> -->
              </div>
            </div>

            <div class="col-md-6">
              <form action="" class="contact_form" method="POST" id="conatact_cus_form">
              <input type="hidden" name="contact_us_action_url" id="contact_us_action_url"  value="{{ route('contact-us-form') }}">
               @csrf
                <div class="tittle_heading">
                  <h3>Reach US</h3>
                  <h2>Contact Us</h2>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="custn_input">

                      <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First name" />
                      @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" />
                      @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" />
                      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone number" id="phone"  />
                      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custn_input">
                      <textarea name="message" id="message" cols="30" rows="6" placeholder="Message" >{{ old('message') }}</textarea>
                      @error('message') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                  </div>
                </div>
                <div class="contact_form_btn">
                  <button type="submit" class="theme_btn">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
@endsection
