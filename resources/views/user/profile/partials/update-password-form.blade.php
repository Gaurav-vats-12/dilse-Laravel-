@extends('layouts.app')
@section('title', 'User Dashboard')
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
    <form method="post" action="{{ route('user.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="cusstom_input">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <button type="button" id="btnToggle" class="_user_toggle_button" passwordType="current_password"><i id="eyeIcon" passwordType="password" class="fa fa-eye " style="font-size: 16px;"></i></button>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div  class="cusstom_input">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <button type="button" id="btnToggle" class="_user_toggle_button" passwordType="password"><i id="eyeIcon"  class="fa fa-eye " style="font-size: 16px;"></i></button>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div  class="cusstom_input">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <button type="button" id="btnToggle" class="_user_toggle_button" passwordType="password_confirmation"><i id="eyeIcon" passwordType="password_confirmation" class="fa fa-eye " style="font-size: 16px;"></i></button>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update Password') }}</x-primary-button>
        </div>
    </form>
            </div>
</div>
</section>

@endsection
