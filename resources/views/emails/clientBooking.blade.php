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
        <h2>📸 Thank You for Booking with Chap Gallery!</h2>
        <p>Hi {{ $booking['name'] }},</p>
        <p>We have received your booking with the following details:</p>
        <ul>
            <li><strong>Date:</strong> {{ $booking['date'] }}</li>
            <li><strong>Time:</strong> {{ $booking['time'] }}</li>
            <li><strong>Location:</strong> {{ $booking['location'] }}</li>
            <li><strong>Type:</strong> {{ $booking['type'] }}</li>
        </ul>
        <p>We will contact you soon for confirmation. If you have any questions, reply to this email.</p>
        <p><strong>Chap Gallery</strong><br>📧 chapgallery11@gmail.com</p>
    </div>
</body>
</html>
