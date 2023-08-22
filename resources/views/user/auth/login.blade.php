
@extends('layouts.app')
@section('title', 'User Login')
@section('frontcontent')
<div class="login_wrapper">
      <section class="about_se about_left_image py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="about_img about_sign_img">
                <img src="{{asset('frontend/img/signin.png')}}" alt="">
              </div>
            </div>
            <div class="col-md-6">
            <form method="POST" action="{{ route('user.login') }}"  class="contact_form">  @csrf
                  <div class="tittle_heading">
                    <h2>SIGN IN TO YOUR <span>ACCOUNT</span></h2>  </div>
                    @if (session()->has('success'))<p>{!! session()->get('success') !!} </p>@endif
                  <div class="row">
                    <div class="col-md-12">
                      <div class="custn_input">
                      <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 taxt-danger" />
                      </div>
                    </div>
                     <div class="col-md-12">
                     <div class="custn_input">
                     <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password"  name="password"  autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                    </div>
                    <div class="forget_passcode">
                     <div class="under_section-form">
                     <input id="remember_me" type="checkbox"  class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                    </div>
                        @if (Route::has('user.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('user.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                    </div>

                   <div class="contact_form_btn">
                    <button class="theme_btn">  {{ __('Log in') }}</button>
                  </div>
                      @if(strpos(URL::previous(),'cart'))
                          <a class="proceed_ancho" href="{{route('checkout.view')}}"> Proceed to checkout As a Guest </a>
                      @endif
                  <p>Don’t have an account?<span><a href="{{ route('user.register') }}">sign-up</a></span></p>
                </form>
              </div>
          </div>
        </div>
      </section>
    </div>
@endsection
