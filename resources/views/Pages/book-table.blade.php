@extends('layouts.app')
@section('title', 'Book A Reservation')
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
                <h1>Book A Table</h1>
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
                  <h2>Book A Table</h2>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required />
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
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="date" value="{{ old('date') }}" placeholder="Date" id="date" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="time" value="{{ old('time') }}" placeholder="Time" id="time" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <select>
                        <option value="0">Select Part Size</option>
                        @for($i=1;$i <= 6;$i++)
                          <option value="{{$i}}">{{$i}} Person </option>
                        @endfor
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custn_input">
                      <textarea
                        name="comments"
                        id=""
                        cols="30"
                        rows="6"
                        placeholder="Comments" required
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
