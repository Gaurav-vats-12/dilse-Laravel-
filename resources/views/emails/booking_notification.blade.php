<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>New Booking Request</h1>
<p>Name: {{ $bookingData['name'] }}</p>
<p>Email: {{ $bookingData['email'] }}</p>
<p>Phone: {{ $bookingData['phone'] }}</p>
<p>date: {{ $bookingData['date'] }}</p>
<p>time: {{ $bookingData['time'] }}</p>
<p>select_part: {{ $bookingData['persons'] }}</p>
<p>comments: {{ $bookingData['comments'] }}</p>
</body>
</html>
