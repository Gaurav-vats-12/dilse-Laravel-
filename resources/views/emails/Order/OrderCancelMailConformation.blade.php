<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Payment Failed - #[Order Number]</title>
    <style>
        /* Add your CSS styles here to customize the email's appearance */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #ff5733;
        }
        p {
            margin-bottom: 20px;
        }
        /* Add more styles as needed */
    </style>
</head>
<body>
<div class="container">

    <h1> Order Payment Failed</h1>
    <p>Dear   @if(Auth::guard('user')->check())<h6>Email:  {{ __('Helklo') }} </h6> @else {{ __($orderMail['CartDetails']->full_name) }} @endif,</p>
    <p>We regret to inform you that there was an issue processing your recent food order #[Order Number] at [Restaurant Name]. Unfortunately, the payment for your order was not successful.</p>
    <h2>Order Details:</h2>
    <p><strong>Order Number:</strong> #{{ __($orderMail['CartDetails']->id) }}</p>
    <p><strong>Order Date and Time:</strong> {{ __( date("d M ,Y", strtotime($orderMail['CartDetails']->order_date)) ) }} ({{ __( DateTime::createFromFormat('H:i:s',explode(' ', $orderMail['CartDetails']->order_date )[1])->format('h:i:s A') ) }} )</p>
    <p><strong>Delivery/Pickup Address:</strong> {{ __($orderMail['CartDetails']->billing_address) }} </p>
    <p><strong>Order Total:</strong> ${{ __($orderMail['CartDetails']->total_amount) }}</p>

    <h2>Payment Failure Reason:</h2>
    <p>{{ __($orderMail['Response']['message']) }}</p>

    <h2>What to Do Next:</h2>
    <ol>
        <li><strong>Payment Method:</strong> Please verify that the payment method you provided is valid and has sufficient funds.</li>
        <li><strong>Billing Information:</strong> Ensure that the billing information you entered matches the details associated with your payment method.</li>
        <li><strong>Contact Support:</strong> If you require any assistance or have questions regarding the payment failure, please don't hesitate to contact our customer support team at {{ setting('phone') != null ? __(setting('phone')) : '' }} or <a href="mailto:{{ setting('site_email') != null ? __(setting('site_email')) : '' }}">{{ setting('site_email') != null ? __(setting('site_email')) : '' }}</a>.</li>
    </ol>

    <p>We understand that these situations can be frustrating, and we apologize for any inconvenience this may have caused. Your satisfaction is important to us, and we're committed to helping you through this situation.</p>

    <p>Thank you for choosing Dil Se Indian Restaurant. We appreciate your business and hope to serve you soon.</p>

    <p>Sincerely,<br>

        Dil Se Indian Restaurant </p>
</div>
</body>
</html>
