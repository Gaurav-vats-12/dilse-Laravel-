@extends('layouts.app')
@section('title', 'User Reset  password')
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
                <form method="POST" action="{{ route('user.password.store') }}" class="contact_form"> @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                  <div class="tittle_heading reset_pass">
                    <h2>RESET YOUR <span>PASSWORD</span></h2>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="custn_input">
                      <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"  readonly type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                      <div class="custn_input">
                      <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" />
                    <button type="button" id="btnToggle" class="toggle_button" passwordType="password"><i id="eyeIcon" passwordType="password" class="fa fa-eye " style="font-size: 16px;"></i></button>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                      <div class="custn_input">
                      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"  name="password_confirmation"  autocomplete="new-password" />
                        <button type="button" id="btnToggle" class="toggle_button" passwordType="password_confirmation"><i id="eyeIcon" passwordType="password_confirmation" class="fa fa-eye " style="font-size: 16px;"></i></button>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                      </div>
                    </div>
               </div>
                  <div class="contact_form_btn">
                    <button class="theme_btn">    {{ __('Reset Password') }}</button>
                  </div>
                  </form>
              </div>
          </div>
        </div>
      </section>
    </div>


@endsection
