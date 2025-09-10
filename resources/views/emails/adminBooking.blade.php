<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .card { padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>📸 New Booking Received</h2>
        <p>You have a new booking:</p>
        <ul>
            <li><strong>Name:</strong> {{ $booking['name'] }}</li>
            <li><strong>Phone:</strong> {{ $booking['phone'] }}</li>
            <li><strong>Email:</strong> {{ $booking['email'] }}</li>
            <li><strong>Date:</strong> {{ $booking['date'] }}</li>
            <li><strong>Time:</strong> {{ $booking['time'] }}</li>
            <li><strong>Location:</strong> {{ $booking['location'] }}</li>
            <li><strong>Type:</strong> {{ $booking['type'] }}</li>
        </ul>
        <p>Login to your admin panel to manage bookings.</p>
    </div>
</body>
</html>
