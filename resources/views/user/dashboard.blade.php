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
                    <div class="menu_main_box1">
                        <div class="tab-content sidebar-tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade  show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="my-account-content mb-50">
                                    <p>Hello <strong>{{ Auth::guard('user')->user()->name }} !</strong> </p>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and
                                        billing addresses, and <a href="account-details.html">edit your password and account details</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
