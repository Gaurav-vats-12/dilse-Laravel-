@extends('layouts.app')
@section('title', 'Thank You')
@section('frontcontent')
    <div class="wraper">
        <section class="about_se py_8">
            <div class="thank-you-container">
                <h2>Your Order Has been  Cancelled  ! </h2>
                <div class="login-content">If you want to order more. Click on the <a href="{{url('menu')}}">Menus</a></p>
                </div>                <p>Your order details: {{$orderItem->id}}</p>
                <table>


                    <tr>
                        <th>Image</th>
                        <th>Product  ID</th>
                        <th>Name</th>
                        <th>Item Amount</th>
                        <th>Quantity</th>
                        <th>Order Type</th>
                    </tr>
                    @foreach ($orderItem->orderItems as $key=>  $items)
                        <tr>
                            <td><img src="{{Storage::url('products/'.$items->product->image )}}"></td>
                            <td>{{$items->id}}</td>
                            <td><a href="/menu/{{$items->product->slug}}">{{$items->product->name}}</a></td>
                            <td>${{$items->product->price}}</td>
                            <td>{{$items->quantity}}</td>
                            <td>{{$orderItem->order_type}}</td>
                        </tr>



                    @endforeach

                </table>
                <div class="login-content">If you want to order more. Click on the <a href="{{url('menu')}}">Menus</a></p>
                    {{-- <p>We'll send a confirmation email shortly.</p> --}}
                </div>
        </section>

        @endsection
        <style>
            .login-content {
                text-align: center;
                margin-top: 50px;
                font-size: 20px;
            }
            .login-content a{font-weight: 600;}
        </style>
