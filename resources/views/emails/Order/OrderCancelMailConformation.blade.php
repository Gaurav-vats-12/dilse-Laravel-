
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <div style="max-width: 600px;margin: 0 auto;padding: 20px;background-color: #212529;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <div class="site_logo" style="text-align:center">
            <a href="https://dilse.exoticaitsolutions.com"><img src="https://dilse.exoticaitsolutions.com/frontend/img/white-logo.svg" alt=""> </a>
        </div>


        <h1 style="color: #eb0029;text-align: center;border-bottom: 1px solid #ffffff2e;padding: 10px 0;margin: 0;">{{ $orderMail['PaymentResponse']['statusMessage'] === "error" ? "Order Cancellation - Payment Failed:" : "Order Confirmation" }}</h1>
        <p style="margin-bottom: -12px;font-size: 20px;font-weight: 600;color: #fff;">Dear {{ __($orderMail['CartDetails']->full_name) }} ,</p>

        <p style="color: #ffff;font-size: 15px;display: block;">{{ $orderMail['PaymentResponse']['statusMessage'] === "error" ? "We regret to inform you that your order has been canceled due to a  ".json_decode($orderMail['CartDetails']->payment->paymnet_json,true)['message']." . The order details are as follows:" : "We are delighted to confirm your order. Your order details are as follows:" }}</p>
        <h2 style="color: #fff; ">Delivery Address:  </h2>
        <address style="color: #fff; font-style: inherit;  ">
        {{ __($orderMail['CartDetails']->billing_address) }}
        </address>

        <h2 style="color: #fff;">Order Information	</h2>
        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="text-align: center;border-collapse:collapse;color: #fff;border-bottom: 1px solid #ffffff2e;padding: 0 20px 20px;">
            <thead style="font-weight: bold;color: #eb0029;">
            <tr>
                <th>Order ID</th>
                <th>Order Date/Order Time</th>
                <th>Order Type </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ __($orderMail['CartDetails']->id) }}</td>
                    <td> {{ __( date("d M ,Y", strtotime($orderMail['CartDetails']->order_date)) ) }} ({{ __( DateTime::createFromFormat('H:i:s',explode(' ', $orderMail['CartDetails']->order_date )[1])->format('h:i:s A') ) }} )</td>
                    <td>{{ __($orderMail['CartDetails']->order_type) }}</td>
                </tr>
                </tbody>
        </table>
        <h2 style="color: #fff;">Food Items</h2>
        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="text-align: center;border-collapse:collapse;color: #fff;border-bottom: 1px solid #ffffff2e;padding: 0 20px 20px;">
            <thead style="font-weight: bold;color: #eb0029;">
            <tr>
                <th>Id</th>
                <th>Order Items</th>
                <th>Price per Unit</th>
                <th>Quantity</th>
                <th>SubTotal  Price</th>
            </tr>
            </thead>
            <tbody>
            @php  $subtotal = 0; @endphp
            @foreach ($orderMail['CartDetails']->orderItems as $keys=>  $items)

                <tr>
                <td  >{{ $keys + 1 }}</td>
                <td>{{ $items->product->name }}</td>
                <td>{{setting('site_currency')}}{{ $items->price    }}</td>
                <td>{{ $items->quantity }}</td>
                <td>{{setting('site_currency')}}{{ round($items->quantity *  $items->price ,2)  }}</td>
                </tr>
                @endforeach
                </tbody>
        </table>
        <h2 style="color: #fff;">Shipping Information</h2>
        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="text-align: center;border-collapse:collapse;color: #fff;border-bottom: 1px solid #ffffff2e;padding: 0 20px 20px;">
            <thead style="font-weight: bold;color: #eb0029;">
            <tr>
                <th>Shipping Charge</th>
                <th>Tax Charge (13 %)</th>
                <th>Delivery Type:</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{setting('site_currency')}}{{ __($orderMail['CartDetails']->shipping_charge) }}  (Tip :{{setting('site_currency')}}{{ __($orderMail['CartDetails']->delivery_tip) }} )</td>
                    <td>{{setting('site_currency')}}{{ __($orderMail['CartDetails']->tax) }}</td>
                    <td>{{ __($orderMail['CartDetails']->order_type) }}</td>
                </tr>
                </tbody>

        </table>
        <h2 style="color: #fff; ">Payment  Information	</h2>
        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="text-align: center;border-collapse:collapse;color: #fff;border-bottom: 1px solid #ffffff2e;padding: 0 20px 20px;">
            <thead style="font-weight: bold;color: #eb0029;">
            <tr >
                <th>Paymnet  ID</th>
                <th>Payment Method:</th>
                <th> Paymnent Status </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ __($orderMail['CartDetails']->payment->id) }}</td>
                    <td>{{ __($orderMail['CartDetails']->payment->payment_method) }}</td>
                    <td>{{ __($orderMail['CartDetails']->payment->payment_status) }}</td>
                </tr>
                </tbody>
        </table>
        <p  style=" color: #fff;"><strong>Order Total: {{setting('site_currency')}}{{$orderMail['CartDetails']->total_amount}}</strong></p>
        <p  style=" color: #fff;"><strong>Spice Level	: {{$orderMail['CartDetails']->spice_lavel}}</strong></p>

        <p style="color: #ffff !importent; font-size: 14px;"> {{ $orderMail['PaymentResponse']['statusMessage'] === "error" ? "We have initiated the refund process for your payment. Please allow some time for the refund to be processed." : "" }}</p>

        <p style="color: #ffff !importent; font-size: 14px;">If you have any questions or need further information, please contact us at {{ setting('site_email') != null ? __(setting('site_email')) : '' }}  or {{ setting('phone') != null ? __(setting('phone')) : '' }}.</p>

        <p style="color: #ffff ;padding: 20px 0; font-size: 18px;">Thank you for choosing our service.</p>
        <p style="color:#eb0029;text-align: right;font-size: 22px;">Regards,<br><span style="color: #fff;font-size: 16px;"> Site Name</span></p>
    </div>
</body>
</html>
