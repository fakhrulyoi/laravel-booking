<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Chap Gallery</title>

    <!-- Modern Professional Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            /* Professional Color System */
            --primary-dark: #0f172a;
            --primary-medium: #1e293b;
            --primary-light: #334155;
            --accent-blue: #3b82f6;
            --accent-emerald: #10b981;
            --accent-amber: #f59e0b;
            --accent-red: #ef4444;
            --neutral-50: #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0;
            --neutral-300: #cbd5e1;
            --neutral-400: #94a3b8;
            --neutral-500: #64748b;
            --neutral-600: #475569;
            --neutral-700: #334155;
            --neutral-800: #1e293b;
            --neutral-900: #0f172a;

            /* Typography */
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Playfair Display', serif;

            /* Layout */
            --sidebar-width: 280px;
            --border-radius: 12px;
            --border-radius-lg: 20px;

            /* Shadows & Effects */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
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
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid var(--neutral-200);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--neutral-200);
            background: var(--primary-dark);
            color: white;
        }

        .sidebar-brand {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-subtitle {
            font-size: 0.875rem;
            opacity: 0.7;
            margin-top: 0.25rem;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.5rem;
            color: var(--neutral-600);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            border-left: 3px solid transparent;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--accent-blue);
            background: rgba(59, 130, 246, 0.05);
            border-left-color: var(--accent-blue);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .top-header {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--neutral-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-sm);
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: var(--neutral-100);
            border-radius: var(--border-radius);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: var(--accent-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        /* Stats Cards */
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
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--accent-blue);
        }

        .stat-card.success::before { background: var(--accent-emerald); }
        .stat-card.warning::before { background: var(--accent-amber); }
        .stat-card.danger::before { background: var(--accent-red); }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }

        .stat-icon.primary { background: var(--accent-blue); }
        .stat-icon.success { background: var(--accent-emerald); }
        .stat-icon.warning { background: var(--accent-amber); }
        .stat-icon.danger { background: var(--accent-red); }

        .stat-number {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary-dark);
            line-height: 1;
        }

        .stat-label {
            color: var(--neutral-600);
            font-weight: 500;
            margin-top: 0.5rem;
        }

        /* Table Container */
        .table-container {
            background: white;
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--neutral-200);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table-header {
            padding: 1.5rem 2rem;
            background: var(--neutral-50);
            border-bottom: 1px solid var(--neutral-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin: 0;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }

        .modern-table {
            width: 100%;
            margin: 0;
            font-size: 0.9rem;
        }

        .modern-table th {
            background: var(--neutral-100);
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--neutral-700);
            border: none;
            position: sticky;
            top: 0;
            z-index: 10;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .modern-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--neutral-200);
            vertical-align: middle;
        }

        .modern-table tbody tr {
            transition: all 0.2s ease;
        }

        .modern-table tbody tr:hover {
            background: var(--neutral-50);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #92400e;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .status-confirmed {
            background: rgba(16, 185, 129, 0.1);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .status-completed {
            background: rgba(59, 130, 246, 0.1);
            color: #1e40af;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Type Badges */
        .type-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
        }

        .type-wedding { background: var(--accent-red); }
        .type-birthday { background: var(--accent-amber); }
        .type-convocation { background: #8b5cf6; }
        .type-couple { background: #ec4899; }
        .type-family { background: var(--accent-emerald); }

        /* Action Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--accent-blue);
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-success {
            background: var(--accent-emerald);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .btn-warning {
            background: var(--accent-amber);
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: var(--accent-red);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            border-color: var(--neutral-300);
            color: var(--neutral-600);
        }

        .btn-outline:hover {
            background: var(--neutral-100);
            border-color: var(--neutral-400);
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }

        .btn-group {
            display: flex;
            gap: 0.5rem;
        }

        /* Modals */
        .modal-content {
            border: none;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-xl);
        }

        .modal-header {
            background: var(--neutral-50);
            border-bottom: 1px solid var(--neutral-200);
            border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
        }

        .modal-title {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            background: var(--neutral-50);
            border-top: 1px solid var(--neutral-200);
            border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg);
        }

        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid var(--neutral-200);
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Alert Styles */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            border: none;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #047857;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--neutral-500);
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--neutral-300);
            margin-bottom: 1.5rem;
        }

        .empty-state-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--neutral-700);
            margin-bottom: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }
        }

        @media (max-width: 768px) {
            .top-header {
                padding: 1rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .table-header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .modern-table th,
            .modern-table td {
                padding: 0.75rem 1rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-dark);
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            .mobile-menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4 class="sidebar-brand">
                <i class="fas fa-camera"></i>
                Chap Gallery
            </h4>
            <div class="sidebar-subtitle">Admin Dashboard</div>
        </div>

        <nav class="sidebar-nav">
            <a class="nav-link active" href="#dashboard">
                <i class="fas fa-chart-line nav-icon"></i>
                <span>Dashboard</span>
            </a>
            <a class="nav-link" href="#bookings">
                <i class="fas fa-calendar-check nav-icon"></i>
                <span>Bookings</span>
            </a>
            <a class="nav-link" href="/" target="_blank">
                <i class="fas fa-external-link-alt nav-icon"></i>
                <span>View Website</span>
            </a>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt nav-icon"></i>
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
            <div class="d-flex align-items-center gap-3">
                <button class="mobile-menu-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">Dashboard Overview</h1>
            </div>

            <div class="header-actions">
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <span class="fw-medium">Administrator</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="container-fluid p-4">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success" data-aos="fade-down">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" data-aos="fade-down">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="stats-grid" data-aos="fade-up">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $totalBookings ?? 0 }}</div>
                    <div class="stat-label">Total Bookings</div>
                </div>

                <div class="stat-card success">
                    <div class="stat-header">
                        <div class="stat-icon success">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $upcomingBookings ?? 0 }}</div>
                    <div class="stat-label">Upcoming Sessions</div>
                </div>

                <div class="stat-card warning">
                    <div class="stat-header">
                        <div class="stat-icon warning">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $completedBookings ?? 0 }}</div>
                    <div class="stat-label">Completed</div>
                </div>

                <div class="stat-card danger">
                    <div class="stat-header">
                        <div class="stat-icon danger">
                            <i class="fas fa-chart-trend-up"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ date('M') }}</div>
                    <div class="stat-label">Current Month</div>
                </div>
            </div>

            <!-- Bookings Table -->
            <div class="table-container" data-aos="fade-up" data-aos-delay="200">
                <div class="table-header">
                    <h3 class="table-title">Booking Management</h3>
                    <div class="table-actions">
                        <span class="badge bg-light text-dark">{{ count($bookings) }} records</span>
                        <button class="btn btn-outline btn-sm" onclick="refreshPage()">
                            <i class="fas fa-sync-alt"></i>
                            <span>Refresh</span>
                        </button>
                    </div>
                </div>

                @if(count($bookings) > 0)
                    <div class="table-responsive">
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Date & Time</th>
                                    <th>Client Information</th>
                                    <th>Service Type</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $index => $booking)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-primary">
                                                #{{ $booking['id'] ?? 'B' . str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">
                                                {{ \Carbon\Carbon::parse($booking['date'])->format('M d, Y') }}
                                            </div>
                                            <div class="text-muted small">
                                                {{ \Carbon\Carbon::parse($booking['time'])->format('h:i A') }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ $booking['name'] }}</div>
                                            <div class="text-muted small">
                                                <div><i class="fas fa-phone me-1"></i>{{ $booking['phone'] }}</div>
                                                <div><i class="fas fa-envelope me-1"></i>{{ $booking['email'] }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="type-badge type-{{ strtolower($booking['type']) }}">
                                                {{ $booking['type'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>
                                                <span>{{ Str::limit($booking['location'], 20) }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-badge status-{{ $booking['status'] ?? 'pending' }}">
                                                <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                                {{ ucfirst($booking['status'] ?? 'pending') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm"
                                                        onclick="editBooking({{ json_encode($booking) }}, {{ $booking['id'] ?? $index }})"
                                                        title="Edit Booking">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                @if(($booking['status'] ?? 'pending') === 'pending')
                                                    <a href="/admin/booking/{{ $booking['id'] ?? $index }}/status?status=confirmed"
                                                       class="btn btn-success btn-sm"
                                                       title="Confirm Booking">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @endif

                                                @if(($booking['status'] ?? 'pending') === 'confirmed')
                                                    <a href="/admin/booking/{{ $booking['id'] ?? $index }}/status?status=completed"
                                                       class="btn btn-warning btn-sm"
                                                       title="Mark as Completed">
                                                        <i class="fas fa-flag-checkered"></i>
                                                    </a>
                                                @endif

                                                <button class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete('{{ $booking['id'] ?? $index }}', '{{ $booking['name'] }}')"
                                                        title="Delete Booking">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-calendar-times"></i>
                        </div>
                        <div class="empty-state-title">No Bookings Found</div>
                        <p class="text-muted">No bookings have been made yet. They will appear here once clients start booking.</p>
                    </div>
                @endif
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
                        Edit Booking Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editBookingForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="edit_phone" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" id="edit_email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" id="edit_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Time</label>
                                <input type="time" name="time" id="edit_time" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Photography Type</label>
                                <select name="type" id="edit_type" class="form-control" required>
                                    <option value="">Select Service</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Birthday">Birthday</option>
                                    <option value="Convocation">Convocation</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" id="edit_status" class="form-control" required>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" id="edit_location" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Special Requirements</label>
                                <textarea name="message" id="edit_message" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Save Changes
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
                    <p class="mb-3">Are you sure you want to delete the booking for <strong id="clientName"></strong>?</p>
                    <div class="alert alert-danger">
                        <i class="fas fa-info-circle me-2"></i>
                        This action cannot be undone and will permanently remove all booking information.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>
                            Delete Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            once: true,
            offset: 50
        });

        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('mobile-open');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-menu-toggle');

            if (window.innerWidth <= 1024 &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('mobile-open');
            }
        });

        // Edit booking function
        function editBooking(booking, bookingId) {
            // Populate form fields
            document.getElementById('edit_name').value = booking.name || '';
            document.getElementById('edit_phone').value = booking.phone || '';
            document.getElementById('edit_email').value = booking.email || '';
            document.getElementById('edit_date').value = booking.date || '';
            document.getElementById('edit_time').value = booking.time || '';
            document.getElementById('edit_type').value = booking.type || '';
            document.getElementById('edit_location').value = booking.location || '';
            document.getElementById('edit_message').value = booking.message || '';
            document.getElementById('edit_status').value = booking.status || 'pending';

            // Set form action URL
            document.getElementById('editBookingForm').action = '/admin/booking/' + bookingId;

            // Show modal
            new bootstrap.Modal(document.getElementById('editBookingModal')).show();
        }

        // Delete confirmation function
        function confirmDelete(bookingId, clientName) {
            document.getElementById('clientName').textContent = clientName;
            document.getElementById('deleteForm').action = '/admin/booking/' + bookingId;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Refresh page function
        function refreshPage() {
            location.reload();
        }

        // Form submission with loading states
        document.getElementById('editBookingForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;

            submitBtn.innerHTML = '<div class="loading me-2"></div>Saving...';
            submitBtn.disabled = true;

            // Reset button after 3 seconds if still on page (in case of errors)
            setTimeout(() => {
                if (submitBtn) {
                    submitBtn.innerHTML = originalContent;
                    submitBtn.disabled = false;
                }
            }, 3000);
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500);
            });
        }, 5000);

        // Add hover effects for table rows
        document.querySelectorAll('.modern-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.005)';
                this.style.transition = 'transform 0.2s ease';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Navigation active state management
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href').startsWith('#')) {
                    e.preventDefault();
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });

        // Loading state for action buttons
        document.querySelectorAll('a[href*="/admin/booking/"]').forEach(btn => {
            btn.addEventListener('click', function() {
                if (!this.classList.contains('btn-danger')) {
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.className = 'fas fa-spinner fa-spin';
                    }
                    this.style.opacity = '0.7';
                    this.style.pointerEvents = 'none';
                }
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + R for refresh
            if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
                e.preventDefault();
                refreshPage();
            }

            // Escape to close modals
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal.show');
                modals.forEach(modal => {
                    bootstrap.Modal.getInstance(modal).hide();
                });
            }
        });
    </script>
</body>
</html>
