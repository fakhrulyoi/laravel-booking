<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// ============================================
// PUBLIC ROUTES (Customer - View Only)
// ============================================

// Homepage - Customer can view calendar only
Route::get('/', [BookingController::class, 'index'])->name('home');

// API: Get all booked dates for calendar
Route::get('/booked-dates', [BookingController::class, 'getBookedDates'])->name('booked-dates');

// ============================================
// AUTHENTICATION ROUTES
// ============================================

// Show login form
Route::get('/login', [BookingController::class, 'showLogin'])->name('login');

// Handle login submission
Route::post('/login', [BookingController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [BookingController::class, 'logout'])->name('logout');

// ============================================
// ADMIN ROUTES (Protected - Manage Bookings)
// ============================================

Route::middleware(['web'])->group(function () {

    // Admin Dashboard
    Route::get('/admin', function () {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->admin();
    })->name('admin');

    // Add New Booking (Admin Only)
    Route::post('/admin/booking', function () {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->store(request());
    })->name('admin.booking.store');

    // Update Booking (Admin Only)
    Route::put('/admin/booking/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->update($id, request());
    })->name('admin.booking.update');

    // Quick Status Update (Admin Only)
    Route::get('/admin/booking/{id}/status', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->updateStatus($id, request());
    })->name('admin.booking.status');

    // Delete Booking (Admin Only)
    Route::delete('/admin/booking/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->delete($id);
    })->name('admin.booking.delete');
});
