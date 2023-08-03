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
                  <p>335 Roncesvalles AveToronto, ON M6R – 2M8</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="location">
                <div class="under_location">
                  <div class="location_img">
                    <img src="{{asset('frontend/img/message.png')}}" alt="" />
                  </div>
                  <p>info@dilse.com</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="location">
                <div class="under_location">
                  <div class="location_img">
                    <img src="{{asset('frontend/img/location.png')}}" alt="" />
                  </div>
                  <p>416-534-6344</p>
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
                <img src="{{asset('frontend/img/contactimg.png')}}" alt="" />
              </div>
            </div>

            <div class="col-md-6">
              <form action="{{ route('contact.submit') }}" class="contact_form" method="POST">
               @csrf
                <div class="tittle_heading">
                  <h3>Reach US</h3>
                  <h2>Contact Us</h2>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone number" id="phone" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custn_input">
                      <textarea
                        name="message"
                        id=""
                        cols="30"
                        rows="6"
                        placeholder="Message" required
                      >{{ old('message') }}</textarea>
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
