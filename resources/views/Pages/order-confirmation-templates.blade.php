@extends('layouts.app')
@section('title', 'Contact Us')
@section('frontcontent')
    <div class="wraper">
        <section class="about_se py_8">
            <div class="thank-you-container">
                <h2>Thank you for your purchase!</h2>
                <p>Your order details:</p>
                <table>


                    <tr>
                        <th>Image</th>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Item Amount</th>
                        <th>Quantity</th>
                        <th>Order Type</th>
                    </tr>
                    @foreach ($orderItem->orderItems as $key=>  $items)
                        <tr>
                            <td><img src="{{Storage::url('products/'.$items->product->image )}}"></td>
                            <td>{{$items->product->id}}</td>
                            <td><a href="/menu/{{$items->product->slug}}">{{$items->product->name}}</a></td>
                            <td>${{$items->product->price}}</td>
                            <td>{{$items->quantity}}</td>
                            <td>{{$orderItem->order_type}}</td>
                        </tr>



                    @endforeach






                </table>
                {{-- <p>We'll send a confirmation email shortly.</p> --}}
            </div>
        </section>

@endsection
