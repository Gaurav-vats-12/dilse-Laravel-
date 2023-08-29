@extends('layouts.app')
@section('title', 'User Register')
@section('frontcontent')
    <div class="wrapper">
        <section class="contact_form_us py_8">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_img_us">
                            <img src="{{asset('frontend/img/signup.png')}}" alt="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form method="POST" action="{{ route('user.register') }}" class="contact_form" id="register_form"> @csrf
                            <div class="tittle_heading">
                                <div class="tittle_heading">
                                    <h2>SIGN UP TO YOUR <span>ACCOUNT</span></h2>
                                </div>
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
                                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone number" id="phone" />
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
                                        <select name="select_part" class="form-control form-select">
                                            <option value="">Select Number Of Guest</option>
                                            @for($i=1;$i <= 20;$i++)
                                                <option value="{{$i}}"  {{ old('select_part') == $i ? 'selected' : '' }} >{{$i}} Person </option>
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
                                <button type="submit" class="theme_btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
