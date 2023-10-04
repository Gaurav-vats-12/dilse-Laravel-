
@extends('layouts.app')
@section('title', 'User Register')
@section('frontcontent')
    <div class="login_wrapper">
        <section class="about_se about_left_image">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="about_img about_sign_img">
                            <img src="{{asset('frontend/img/signup.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('user.register') }}" class="contact_form" id="register_form"> @csrf
                            <div class="tittle_heading">
                                <h2>SIGN UP TO YOUR <span>ACCOUNT</span></h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custn_input">
                                        <x-text-input id="name"  placeholder="Full Name"  class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custn_input">
                                        <x-text-input id="email"  placeholder="Email Address " class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custn_input pass_show">
                                        <x-text-input id="password"  placeholder="Your password" class="block mt-1 w-full password" type="password" name="password"   autocomplete="new-password" />
                                        <button type="button" id="btnToggle" class="toggle" passwordType="password"><i id="eyeIcon" passwordType="password" class="fa fa-eye " style="font-size: 16px;"></i></button>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custn_input pass_show">
                                        <x-text-input id="password_confirmation" placeholder="Confirm password" class="block mt-1 w-full password" type="password"  name="password_confirmation"  autocomplete="new-password" />
                                        <button type="button" id="btnToggle" class="toggle" passwordType="password_confirmation"><i id="eyeIcon" passwordType="password_confirmation" class="fa fa-eye" style="font-size: 16px;"></i></button>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check d-flex">
                                    <input type="checkbox" name="privacyPolicy" class="form-check-input me-2" id="remember"   value="1">
                                    <label class="form-check-label mt-2" for="remember" class="text-capitalize">
                                        By signing up you agree to our
                                        <a href="{{url('terms-and-conditions')}}" target="_blank">Terms &amp; Conditions</a>
                                        &amp;
                                        <a href="{{url('privacy-policy')}}" target="_blank">Privacy Policy</a>.
                                    </label>

                                </div>
                                <x-input-error :messages="$errors->get('privacyPolicy')" class="mt-2" />
                            </div>
                            <div class="contact_form_btn">
                                <button class="theme_btn">Sign Up</button>
                            </div>
                            <p>Already have an account? <a href="{{ route('user.login') }}" class="text-capitalize">sign-In </a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
