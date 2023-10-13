@extends('layouts.app')
@section('title', 'User Edit Profile Update ')
@section('frontcontent')

    <section class="menu_main1 py_8">
        <div class="container">
            <div class="tittle_heading">
                <h2>User dashboard</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('user.layouts.partials.user_sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="wap-order">
                    <form method="post" action="{{ route('user.profile.update') }}" class="mt-6 space-y-6">@csrf @method('patch')
                        <input type="hidden" name="login_user_id" id="login_user_id" value="{{ $user->id }}">
                        <div class="cusstom_input">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="cusstom_input">
                            <x-input-label for="email" :value="__('Email Address')" />
                            <x-text-input id="email" name="email" readonly="" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"  autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="cusstom_input">
                            <x-input-label for="email" :value="__('Phone Number')" />
                            <x-text-input id="user_phone" name="phone"  placeholder="Enter Phone Number" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)"  autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        <x-primary-button class="theme_btn">{{ __('Save') }}</x-primary-button>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </section>
@endsection
