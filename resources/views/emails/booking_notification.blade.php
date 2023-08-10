<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmation</title>
</head>
<body>
  <h1>Booking Confirmation</h1>
  <p>Thank you for your booking! Your reservation is confirmed for <strong>{{ $bookingData['date'] }} </strong> at <strong>{{ $bookingData['time'] }} </strong>.</p>
  <p>Here are the details of your booking:</p>
  <ul>
    <li>Name: <strong>{{ $bookingData['name'] }}</strong></li>
    <li>Contact Information: <strong>{{ $bookingData['phone'] }} , {{ $bookingData['email'] }}</strong></li>
    <li>Number of Guests: <strong>{{ $bookingData['persons'] }}</strong></li>
    <li>Special Requests: <strong> {{ $bookingData['comments'] }} </strong></li>
  </ul>
  <p>We look forward to seeing you on <strong> {{ $bookingData['date'] }}( {{ $bookingData['time'] }}) !</strong></p>
  <p>Sincerely,</p>
  <p>Dil Se</p>
</body>
</html>
