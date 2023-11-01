<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Referral Reward: Your Special Coupon</title>
</head>
<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td align="center" bgcolor="#f5f5f5" style="padding: 40px 0 30px 0;">
            <h1>Referral Reward: Your Special Coupon</h1>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
            <p>Dear {{ $user_data['user']['name'] }},</p>
            <p>Thank you for referring {{ $user_data['Response']->billing_full_name }} Your support means a lot to us.</p>
            <p>To show our appreciation, here's a special reward for you:</p>
            <p><strong>Your Unique Coupon Code: {{ $user_data['coupon_array']['coupon_code'] }}</strong></p>
            <p>This code is exclusively for your use and is valid until {{ $user_data['coupon_array']['end_date'] }}.</p>
            <p>Thank you again for your continued support and loyalty.</p>
            <p>Warm regards,</p>
            <p>Dil Se Indian Restaurant & Bar</p>
        </td>
    </tr>
</table>
</body>
</html>
