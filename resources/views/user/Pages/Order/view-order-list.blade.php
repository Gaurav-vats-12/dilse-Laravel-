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
                        <h5 class="order-head">My <span class="primary-text"> Orders </span></h5>
                        @if (isset($OrderDetails) && count($OrderDetails) >0)
                            @foreach($OrderDetails as $key => $orders)
                                <div class="wap-lis" order_uiod = {{ $orders->id }}>
                                    <div class="stat d-flex justify-content-between">
                                        <h6 class="ser-infh"><b>Order No.</b>{{ $orders->id }}</h6>
                                        <h6 class="ser-infh pla"> <b>Order Date</b>
                                            :{{   date("d M ,Y", strtotime($orders->order_date))  }} ({{  DateTime::createFromFormat('H:i:s',explode(' ', $orders->order_date)[1])->format('h:i:s A')  }})
                                            &nbsp;| &nbsp; <b>Status:</b>
                                            <span>{{ $orders->status }}</span>
                                            @if($orders->status =='Pending')|
                                            <a href="{{ route('user.order-cancelled' ,$orders->id) }}" onclick="return confirm('Are you sure?');" class="btn-danger">Cancel Order</a>

                                            @endif
                                        </h6>
                                    </div>
                                    <div class="franchies-wap table-responsive orders-table-wrapper mt-3">
                                        <hr>
                                        <table class="table orders-table table-borderless">
                                            <thead>
                                            <tr>
                                                <th style="width:130px">S.N.</th>
                                                <th>Item Name</th>
                                                <th style="width:150px" class="text-center">Price</th>
                                                <th style="width:150px" class="text-center">Qty</th>
                                                <th style="width:100px" class="text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php  $subtotal = 0; @endphp
                                            @foreach ($orders->orderItems as $keys=>  $items)
                                                @php  $subtotal = $subtotal + $items["price"] *  $items["quantity"]@endphp

                                                <tr>
                                                    <td  >{{ $keys + 1 }}</td>
                                                    <td>{{ $items->product->name }}</td>
                                                    <td>{{ $items->product->price }}</td>
                                                    <td>{{ $items->quantity }}</td>
                                                    <td>{{ $items->price    }}</td>
                                                </tr>
                                                @endforeach
                                            <div class="subtotal_Order">
                                                <tr class="last-tqab">
                                                    <td><span class="do">Sub Total: </span></td>
                                                    <td><span class="totals">${{$subtotal}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="last-tqab">
                                                    <td><span class="do">Shipping Cost:</span></td>
                                                    <td><span class="totals">${{$orders->shipping_charge}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="last-tqab">
                                                    <td><span class="do">Order Total:</span></td>
                                                    <td><span class="totals">${{ $subtotal + $orders->shipping_charge }}</span>
                                                    </td>
                                                </tr>
                                            </div>
                                            </tbody>
                                        </table>
                                        <div class="Reorder_Class">
                                            @if($orders->status =='Delivered')
                                                <a class="" href="{{ route('user.OrderReorder' ,$orders->id) }}"> Reorder Order</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="no-order-message taxt-center">
                                <h2>No Orders Found</h2>
                                </div>
                            <div class="back-to-home">
                                <a href="{{ route('menu','appetizers') }}">Back to Menu</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
