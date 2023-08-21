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
                    <form method="post" action="{{ route('user.profile.address.update') }}" class="form profile-info-form">@csrf @method('patch')
                        <input type="hidden"  class="form-control" name="login_uer_id" value="{{ Auth::guard('user')->check() ? Auth::guard('user')->user()->id  : old('login_user_id') }}">
                        <div class="col-md-12">
                            <div class="cusstom_input">
                                <label for="billing_company" class="">Company name&nbsp;<span
                                        class="optional">(optional)</span></label>
                                <input type="text" placeholder="Enter  Company Name" name="billing_email" id="billing_email" value=" {{ Auth::guard('user')->check() ? old('billing_company' ,Auth::guard('user')->user()->billing_company)  : old('billing_company') }} ">
                                @error('billing_company')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @include('ajax.user_address_form')
                        <x-primary-button class="theme_btn">{{ __('Update') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
