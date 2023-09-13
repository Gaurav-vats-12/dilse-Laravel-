<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center">
            <h1>Order Confirmation</h1>
        </td>
    </tr>
</table>

<table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Order Information</th>
        <td></td>
    </tr>
    <tr>
        <td>Order ID:</td>
        <td>   {{ __($orderMail['CartDetails']->id) }}</td>
    </tr>
    <tr>
        <td>Order Date:</td>
        <td>   {{ __( date("d M ,Y", strtotime($orderMail['CartDetails']->order_date)) ) }} ({{ __( DateTime::createFromFormat('H:i:s',explode(' ', $orderMail['CartDetails']->order_date )[1])->format('h:i:s A') ) }} )</td>
    </tr>
    <tr>
        <td>Payment Method:</td>
        <td> {{ __($orderMail['CartDetails']->payment->payment_method) }} </td>
    </tr>
    <tr>
        <td>Spice Level:</td>
        <td> {{ __(  $orderMail['CartDetails']->spice_lavel ?  $orderMail['CartDetails']->spice_lavel : 'Not Found') }} </td>
    </tr>
</table>

<table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Shipping Information</th>
        <td></td>
    </tr>
    <tr>
        <td>Billing  Address:</td>
        <td> {{ __($orderMail['CartDetails']->billing_address) }}</td>
    </tr>

    <tr>
        <td>Shipping Address:</td>
        <td>{{ __($orderMail['CartDetails']->shipping_address) }}</td>
    </tr>
    <tr>
        <td>Delivery  Type :</td>
        <td>{{ __($orderMail['CartDetails']->order_type) }}  </td>
    </tr>
    <tr>
        <td>Shipping/Delivery  Cost:</td>
        <td>{{setting('site_currency')}}{{ __($orderMail['CartDetails']->shipping_charge) }}
             (Tip :{{setting('site_currency')}}{{ __($orderMail['CartDetails']->delivery_tip) }} ) </td>
    </tr>
</table>

<table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th>Id</th>
        <th>Order Items</th>
        <th>Quantity</th>
        <th>Price per Unit</th>
        <th>SubTotal  Price</th>
    </tr>
    </thead>
    <tbody>
    @php  $subtotal = 0; @endphp
    @foreach ($orderMail['CartDetails']->orderItems as $keys=>  $items)
        @php  $subtotal = $subtotal + $items["price"] *  $items["quantity"]@endphp
        <tr>
            <td  >{{ $keys + 1 }}</td>
            <td>{{ $items->product->name }}</td>
            <td>{{ $items->quantity }}</td>
            <td>{{ $items->price    }}</td>
            <td>{{$items->quantity *  $items->price  }}</td>
        </tr>
    @endforeach
    </tbody>

    <!-- Add more rows for additional order items as needed -->
</table>

<p><strong>Order Total: ${{$orderMail['CartDetails']->total_amount}}</strong></p>

<p>Thank you for placing your order with us. We will process your order as soon as possible.</p>

<p>If you have any questions or need further information, please contact us at {{ setting('site_email') != null ? __(setting('site_email')) : '' }}  or {{ setting('phone') != null ? __(setting('phone')) : '' }}.</p>

<p>Best regards,<br>{{ setting('site_title') != null ? __(setting('site_title')) : '' }}</p>
</body>
</html>
