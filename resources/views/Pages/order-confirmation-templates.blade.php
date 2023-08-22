@extends('layouts.app')
@section('title', 'Thank You')
@section('frontcontent')
    <div class="wraper">
        <section class="about_se py_8">
            <div class="thank-you-container">
                <h2>Thank you for your purchase!</h2>
                <p>Your order details: {{$orderItem->id}}</p>
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
                <p>If you want to order more : <a href="/">home</a></p>
                {{-- <p>We'll send a confirmation email shortly.</p> --}}
            </div>
        </section>

@endsection
