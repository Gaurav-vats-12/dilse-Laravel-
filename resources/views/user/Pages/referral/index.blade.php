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
                    @if (isset($Coupon))
                    <div class="wap-order">

                        <div class="col-md-12">
                            <div class="cusstom_input">
                                <label for="reffrel_code" class="">Your referral Code </span></label>
                                <input type="text"  id="reffrel_code" name="reffrel_code"  value="{{ $Coupon->code }}" readonly >
                            </div>
                        </div>
                        <span class="text-bold"> List of User Which have used Referral </span>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
