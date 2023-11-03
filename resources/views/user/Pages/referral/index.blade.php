@php
use Carbon\Carbon;
 @endphp
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
                                <span>
                                    Hello, <b>{{ \Illuminate\Support\Facades\Auth::guard('user')->user()->name }} </b>. Here is your  referral Code  share  with your friends and family to receive the <b>$10</b> discount on your order.
                               for Unlimited times**
                                </span>

                                <input type="text"  id="reffrel_code" name="reffrel_code"  value="{{ $Coupon->code }}" readonly >
                                {!! $shareComponent !!}
                            </div>
                        </div>
                        <span class="text-bold"></span>
                        <div class="franchies-wap table-responsive orders-table-wrapper mt-3">
                            <hr>
                            @foreach ($reffral  as $keys=>  $reffral_list)
                            <div class="" role="alert">
                                <h5><b>Congratulations {{ \Illuminate\Support\Facades\Auth::guard('user')->user()->name }} !</b> Your referral code redemption at Dil Se Indian Restaurant & Bar reveals a special coupon. Use code <b>{{ $reffral_list->code }}</b> form  <b>{{ $reffral_list->user_email}}</b> for an exclusive offer. Hurry, it's valid for <b> {{Carbon::parse($reffral_list->start_date)->diffInDays(Carbon::parse($reffral_list->end_date)) }} days</b> . Enjoy the benefits on your next visit or online order!
                            </div>
                            @endforeach
                            <div class="Reorder_Class">
                                {{-- @if($orders->status =='Delivered')
                                    <a class="" href="{{ route('user.OrderReorder' ,$orders->id) }}"> Reorder Order</a>
                                @endif --}}
                            </div>
                        </div>
                    </div>


                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
