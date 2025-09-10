<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking - Chap Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Tempahan Photoshoot</h1>

    <!-- Success & Error -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <!-- Form -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4 class="mb-3">Borang Tempahan</h4>
                <form action="/book" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>No Telefon</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Tarikh</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Masa</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Lokasi</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Jenis Photoshoot</label>
                        <select name="type" class="form-control" required>
                            <option value="Wedding">Wedding</option>
                            <option value="Birthday">Birthday</option>
                            <option value="Convocation">Convocation</option>
                            <option value="Couple">Couple</option>
                            <option value="Family">Family</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tempah</button>
                </form>
            </div>
        </div>

        <!-- Calendar -->
        <div class="col-md-8">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 600,
            events: [
                @foreach($bookings as $b)
                {
                    title: '{{ $b['type'] }} - {{ $b['name'] }} ({{ $b['time'] }})',
                    start: '{{ $b['date'] }}T{{ $b['time'] }}',
                    color: '#0d6efd'
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>

</body>
</html>
