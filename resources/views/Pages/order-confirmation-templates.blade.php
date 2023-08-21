@extends('layouts.app')
@section('title', 'Contact Us')
@section('frontcontent')
    <div class="wraper">
        <section
            class="inner_bannner bg_style"
            style="background-image: url({{asset('frontend/img/contact_banner.png')}})"
        >
            <div class="about_banner_section">
                <div class="home-slider-main">
                    <div class="container">
                        <div class="home-slider-content">
                            <h1>  Thank you, Your order has been received!!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                    @foreach($orderItem->OrderItems as $key => $item)

                    @php
                        $relatedProduct = $product->where('id', $item->id)->first();
                    @endphp

                    <tr>
                        <td><img src="{{Storage::url('products/' . $relatedProduct->image)}}"></td>
                        <td>{{$item->id}}</td>
                        <td><a href="/menu/{{$relatedProduct->slug}}">{{$relatedProduct->name}}</a></td>
                        <td>${{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$orderItem->order_type}}</td>
                    </tr>
                @endforeach





                </table>
                {{-- <p>We'll send a confirmation email shortly.</p> --}}
            </div>
        </section>

@endsection
