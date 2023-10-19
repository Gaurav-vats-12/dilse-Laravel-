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
          <div class="row align-items-center" >
            <div class="col-md-6">
              <div class="contact_img_us">
                <img src="{{asset('frontend/img/contactimg.png')}}" alt="" />
              </div>
            </div>

            <div class="col-md-6">
              <form action="{{ route('booktable.submit') }}" class="contact_form" method="POST" id="book-a-reservation">
               @csrf
                <div class="tittle_heading">
                  <h2>Book A Table</h2>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" />
                      @error('name')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" />
                      @error('email')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone number" id="booking_phone" />
                      @error('phone')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <input type="text" name="date" value="{{ old('date') }}" placeholder="Date" id="datepicker" />
                      @error('date')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input" id="inputWrapper">
                      <input type="text"  name="time" value="{{ old('time') }}" placeholder="Time" id="timepicker" />
                      @error('time')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custn_input">
                      <select name="select_part" class="form-select" id="select_part">
                        <option value="">Select Guests</option>
                        @for($i=1;$i <= 20;$i++)
                          <option value="{{$i}}"  {{ old('select_part') == $i ? 'selected' : '' }} >{{$i}}  </option>
                        @endfor
                      </select>
                      @error('select_part')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custn_input">
                      <textarea
                        name="comments"
                        id=""
                        cols="30"
                        rows="6"
                        placeholder="Comments"
                      >{{ old('comments') }}</textarea>
                      @error('comments')
                      <div class="error">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                </div>
                <div class="contact_form_btn">
                  <button type="submit" class="theme_btn">Book A Table</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <style>
        .custn_input {
    margin-bottom: 22px;
}
        </style>
@endsection
