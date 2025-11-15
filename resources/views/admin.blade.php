<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Chap Gallery</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-dark: #0f172a;
            --accent-blue: #3b82f6;
            --accent-emerald: #10b981;
            --accent-amber: #f59e0b;
            --accent-red: #ef4444;
            --neutral-50: #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0;
            --neutral-600: #475569;
            --neutral-700: #334155;
            --font-primary: 'Inter', sans-serif;
            --border-radius: 12px;
            --border-radius-lg: 20px;
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            background: var(--neutral-50);
            color: var(--neutral-700);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: white;
            border-right: 1px solid var(--neutral-200);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--neutral-200);
            background: var(--primary-dark);
            color: white;
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.5rem;
            color: var(--neutral-600);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--accent-blue);
            background: rgba(59, 130, 246, 0.05);
        }

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        .top-header {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--neutral-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-md);
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--neutral-200);
            box-shadow: var(--shadow-md);
        }

        .stat-number {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .stat-label {
            color: var(--neutral-600);
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .table-container {
            background: white;
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--neutral-200);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .table-header {
            padding: 1.5rem 2rem;
            background: var(--neutral-50);
            border-bottom: 1px solid var(--neutral-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--accent-blue);
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-success {
            background: var(--accent-emerald);
            color: white;
        }

        .btn-danger {
            background: var(--accent-red);
            color: white;
        }

        .status-badge {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #92400e;
        }

        .status-confirmed {
            background: rgba(16, 185, 129, 0.1);
            color: #047857;
        }

        .status-completed {
            background: rgba(59, 130, 246, 0.1);
            color: #1e40af;
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid var(--neutral-200);
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #047857;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4 class="sidebar-brand">
                <i class="fas fa-camera"></i>
                Chap Gallery
            </h4>
        </div>

        <nav style="padding: 1.5rem 0;">
            <a class="nav-link active" href="/admin">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            <a class="nav-link" href="/" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                <span>View Website</span>
            </a>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </nav>

        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <div class="top-header">
            <h1 class="page-title">Dashboard</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal">
                <i class="fas fa-plus"></i>
                <span>Add New Booking</span>
            </button>
        </div>

        <!-- Dashboard Content -->
        <div class="container-fluid p-4">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $totalBookings ?? 0 }}</div>
                    <div class="stat-label">Total Bookings</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">{{ $upcomingBookings ?? 0 }}</div>
                    <div class="stat-label">Upcoming Sessions</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">{{ $completedBookings ?? 0 }}</div>
                    <div class="stat-label">Completed</div>
                </div>
            </div>

            <!-- Bookings Table -->
            <div class="table-container">
                <div class="table-header">
                    <h3 style="margin: 0;">Booking Management</h3>
                    <span class="badge bg-light text-dark">{{ count($bookings) }} records</span>
                </div>

                @if(count($bookings) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Client</th>
                                    <th>Service Type</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">{{ \Carbon\Carbon::parse($booking['date'])->format('M d, Y') }}</div>
                                            <div class="text-muted small">{{ $booking['time'] }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ $booking['name'] }}</div>
                                            <div class="text-muted small">{{ $booking['phone'] }}</div>
                                        </td>
                                        <td>{{ $booking['type'] }}</td>
                                        <td>{{ $booking['location'] }}</td>
                                        <td>
                                            <span class="status-badge status-{{ $booking['status'] ?? 'pending' }}">
                                                {{ ucfirst($booking['status'] ?? 'pending') }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                    onclick="editBooking({{ json_encode($booking) }})"
                                                    title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            @if(($booking['status'] ?? 'pending') === 'pending')
                                                <a href="/admin/booking/{{ $booking['id'] }}/status?status=confirmed"
                                                   class="btn btn-success btn-sm"
                                                   title="Confirm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            @endif

                                            <button class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('{{ $booking['id'] }}', '{{ $booking['name'] }}')"
                                                    title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-times" style="font-size: 3rem; color: var(--neutral-200);"></i>
                        <p class="mt-3 text-muted">No bookings yet. Click "Add New Booking" to get started.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Add Booking Modal -->
    <div class="modal fade" id="addBookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle me-2"></i>
                        Add New Booking
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/admin/booking" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Client Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number *</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email (Optional)</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date *</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Time *</label>
                                <input type="time" name="time" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Photography Type *</label>
                                <select name="type" class="form-control" required>
                                    <option value="">Select Service</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Birthday">Birthday</option>
                                    <option value="Convocation">Convocation</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Family">Family</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed" selected>Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Location *</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes (Optional)</label>
                                <textarea name="message" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Add Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Booking Modal -->
    <div class="modal fade" id="editBookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>
                        Edit Booking
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editBookingForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Client Name *</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number *</label>
                                <input type="text" name="phone" id="edit_phone" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email (Optional)</label>
                                <input type="email" name="email" id="edit_email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date *</label>
                                <input type="date" name="date" id="edit_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Time *</label>
                                <input type="time" name="time" id="edit_time" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Photography Type *</label>
                                <select name="type" id="edit_type" class="form-control" required>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Birthday">Birthday</option>
                                    <option value="Convocation">Convocation</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Family">Family</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" id="edit_status" class="form-control" required>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Location *</label>
                                <input type="text" name="location" id="edit_location" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes (Optional)</label>
                                <textarea name="message" id="edit_message" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Update Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                        Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the booking for <strong id="clientName"></strong>?</p>
                    <div class="alert alert-danger">
                        <i class="fas fa-info-circle me-2"></i>
                        This action cannot be undone.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function editBooking(booking) {
            document.getElementById('edit_name').value = booking.name || '';
            document.getElementById('edit_phone').value = booking.phone || '';
            document.getElementById('edit_email').value = booking.email || '';
            document.getElementById('edit_date').value = booking.date || '';
            document.getElementById('edit_time').value = booking.time || '';
            document.getElementById('edit_type').value = booking.type || '';
            document.getElementById('edit_location').value = booking.location || '';
            document.getElementById('edit_message').value = booking.message || '';
            document.getElementById('edit_status').value = booking.status || 'pending';

            document.getElementById('editBookingForm').action = '/admin/booking/' + booking.id;

            new bootstrap.Modal(document.getElementById('editBookingModal')).show();
        }

        function confirmDelete(bookingId, clientName) {
            document.getElementById('clientName').textContent = clientName;
            document.getElementById('deleteForm').action = '/admin/booking/' + bookingId;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>
