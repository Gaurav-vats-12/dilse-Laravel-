@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{url('/user/dashboard')}}">
<meta name="description" content="User Dashboard Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{url('/user/dashboard')}}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="User Dashboard Page">
  <meta property="og:description" content="Home Page">
  <meta property="og:image" content="">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{url('/user/dashboard')}}">
  <meta property="twitter:domain" content="{{url('/user/dashboard')}}">
  <meta name="twitter:title" content="Home Page">
  <meta name="twitter:description" content="User Dashboard Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{url('/user/dashboard')}}">
@endsection
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
                    <div class="menu_main_box1">
                        <div class="tab-content sidebar-tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade  show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="my-account-content mb-50">
                                    <p>Hello <strong>{{ Auth::guard('user')->user()->name }} </strong> </p>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and
                                        billing addresses, and <a href="/user/confirm-passwords">edit your password</a> and <a href="/user/profile">account details</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
