@extends('layouts.app')
@section('title', 'User Forget password')
@section('frontcontent')
<div class="login_wrapper">
      <section class="about_se about_left_image py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="about_img about_sign_img">
                <img src="{{asset('frontend/img/forgetpassword.png')}}" alt="">
              </div>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('user.password.email') }}" class="contact_form"> @csrf
                  <div class="tittle_heading">
                    <h2>FORGET YOUR <span>PASSWORD</span></h2>
                    <div class="text-sm text-gray-600 forget_password_txt ">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="custn_input forget_input_email">
                      <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" placeholder="Enter your email" type="email" name="email" :value="old('email')"  autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                    </div>
               </div>
                  <div class="contact_form_btn">
                    <button class="theme_btn">  {{ __('Email Password Reset Link') }}</button>
                  </div>
                  <x-auth-session-status class="password_message_append" :status="session('status')" />
                  </form>
              </div>
          </div>
        </div>
      </section>
    </div>
@endsection
