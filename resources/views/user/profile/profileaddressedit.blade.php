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
                    <form method="post" action="{{ route('user.profile.address.update') }}" class="form profile-info-form">@csrf @method('patch')
                        <input type="hidden"  class="form-control" name="login_uer_id" value="{{ Auth::guard('user')->check() ? Auth::guard('user')->user()->id  : old('login_user_id') }}">

                        @include('ajax.user_address_form')
                        <x-primary-button class="theme_btn">{{ __('Update Address ') }}</x-primary-button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
