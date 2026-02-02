<!DOCTYPE html>
<html>
<head>
    <title>New Booking Request</title>
</head>
<body>
    <h2>New Appointment Request</h2>
    <p><strong>Name:</strong> {{ $booking->name }}</p>
    <p><strong>Phone:</strong> {{ $booking->phone }}</p>
    <p><strong>State:</strong> {{ $booking->state }}</p>
    <p><strong>District:</strong> {{ $booking->district }}</p>
    <p><strong>City:</strong> {{ $booking->city }}</p>
    <br>
    <p>Please contact the customer to confirm the appointment.</p>
</body>
</html>
