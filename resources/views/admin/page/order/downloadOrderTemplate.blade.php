<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
<h1>Order Details</h1>

<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
    <h2>Customer Information</h2>
    <strong>Full Name :</strong> <span
        class="text-bold ">{{ $orders->full_name }}</span> <br>
    <strong>Email Address :</strong> <span
        class="">{{ $orders->email_address }}</span> <br>
    <strong>Phone Number :</strong> <span
        class="">{{ $orders->phone_number }}</span><br>
    <strong> Full Address :</strong> <span
        class="">{{ $orders->shipping_address }}</span><br>
</div>
<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
    <h2>Order Details</h2>
    <strong>Order Number:</strong> #{{ $orders->id }}<br>
    <strong>Date:</strong> <span
        class="text-bold ">{{ $orders->order_date }}</span> <br>
    <strong>Status:</strong> {{ $orders->status }}
    <br>
    <strong>Store Location:</strong> {{ $orders->store_location }}<br>
    <strong>Spice Level:</strong> {{ $orders->spice_lavel ?  $orders->spice_lavel : 'Not Found' }}

</div>

<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
    <h2>Payment Information</h2>
    <strong>Payment Date:</strong> {{ $orders->payment->payment_date }}<br>
    <strong>Payment Method:</strong> {{ $orders->payment->payment_method }}<br>
    <strong>Total Amount:</strong> ${{ $orders->payment->payment_amount }}<br>
    <strong>Payment Status :</strong>
    {{ $orders->payment->payment_status }}<br>
</div>

<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <th style="  border: 1px solid #ccc; padding: 8px; text-align: left;">Sno</th>
        <th style="  border: 1px solid #ccc; padding: 8px; text-align: left;">Item</th>
        <th style="  border: 1px solid #ccc; padding: 8px; text-align: left;">Quantity</th>
        <th style="  border: 1px solid #ccc; padding: 8px; text-align: left;">Price</th>
        <th style="  border: 1px solid #ccc; padding: 8px;  text-align: left;">Total</th>
    </tr>
    @php  $subtotal = 0; @endphp
    @foreach ($orders->orderItems as $key => $items)
        @php  $subtotal = $subtotal + $items["price"] *  $items["quantity"]@endphp

        <tr>
        <td style="  border: 1px solid #ccc; padding: 8px; text-align: left;">{{ $key + 1 }}</td>
        <td style="  border: 1px solid #ccc; padding: 8px; text-align: left;">{{ $items->product->name }}</td>
        <td style="  border: 1px solid #ccc; padding: 8px; text-align: left;">{{ setting('site_currency')}} {{ $items->product->price }}</td>
        <td style="  border: 1px solid #ccc; padding: 8px; text-align: left;">{{ $items->quantity }}</td>
        <td style="  border: 1px solid #ccc; padding: 8px; text-align: left;">{{ setting('site_currency')}}{{ $subtotal }}</td>
    </tr>
    @endforeach
</table>

<p><strong>Sub Total:</strong> {{ setting('site_currency')}} {{ $orders->sub_total }}</p>
<p><strong>Discount ( Coupon Applied : {{ $orders->coupon_code  }}):</strong> {{ setting('site_currency')}} {{ $orders->discount_price }}</p>
<p><strong> Total:</strong> {{ setting('site_currency')}} {{ $orders->sub_total - $orders->discount_price  }}</p>
<p><strong>Tax ({{setting('tax' ,0.00)}}%): </strong>  {{ setting('site_currency')}}{{ $orders->tax }}</p>

<p><strong>Shipping Fees : </strong>   {{ setting('site_currency')}}{{ $orders->shipping_charge }} (Tip :{{setting('site_currency')}}{{ __($orders->delivery_tip) }} )</p>
<p><strong> Grand Total  :</strong> {{ setting('site_currency')}} {{ $orders->total_amount }}</p>
<p><strong>Status:</strong>   {{ $orders->status }}</p>
</body>
</html>
