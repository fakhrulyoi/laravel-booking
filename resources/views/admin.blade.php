<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tempahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Admin Panel - Senarai Tempahan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped shadow-sm">
        <thead class="table-dark">
        <tr>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Nama</th>
            <th>No Telefon</th>
            <th>Email</th>
            <th>Lokasi</th>
            <th>Jenis</th>
            <th>Tindakan</th>
        </tr>
        </thead>
        <tbody>
        @forelse($bookings as $b)
            <tr>
                <td>{{ $b['date'] ?? '-' }}</td>
                <td>{{ $b['time'] ?? '-' }}</td>
                <td>{{ $b['name'] ?? '-' }}</td>
                <td>{{ $b['phone'] ?? '-' }}</td>
                <td>{{ $b['email'] ?? '-' }}</td>
                <td>{{ $b['location'] ?? '-' }}</td>
                <td>{{ $b['type'] ?? '-' }}</td>
                <td>
                    <a href="/delete/{{ $b['date'] }}?time={{ $b['time'] }}" class="btn btn-sm btn-danger">Padam</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center">Tiada tempahan lagi</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
