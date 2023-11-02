@extends('layouts.app')
@section('title', 'User Order List')
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
                        <input type="hidden" name="orderedajax" id="orderedajax" value="{{ route('user.order') }}">
                        <h5 class="order-head">My Orders</h5>
                        <div class="row">
                            <div class="col-md-6">  <div class="filter">
                                    <h6 for="manage_by_order">Filter By Order  Status:</h6>
                                    <select id="manage_by_order"  type="order" class="manage_by_order">
                                        <option value="all">All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div></div>
                            <div class="col-md-6">
                            </div>

                        </div>

                        <div id="loader" class="loader-container">
                            <div class="loader"></div>
                        </div>
                        <div id="OrderStatus">

                            @include('user.ajax.OrderDetails')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
