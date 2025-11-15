<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Public routes
Route::get('/', [BookingController::class, 'index'])->name('home');
Route::post('/book', [BookingController::class, 'store'])->name('book.store');
Route::get('/all-bookings', [BookingController::class, 'getAllBookings'])->name('all-bookings');
// API routes for calendar
Route::get('/booked-dates', [BookingController::class, 'getBookedDates'])->name('booked-dates');

// Authentication routes
Route::get('/login', [BookingController::class, 'showLogin'])->name('login');
Route::post('/login', [BookingController::class, 'login'])->name('login.submit');
Route::post('/logout', [BookingController::class, 'logout'])->name('logout');

// Admin routes (protected)
Route::middleware(['web'])->group(function () {
    Route::get('/admin', function () {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->admin();
    })->name('admin');

    Route::get('/admin/booking/{id}/status', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->updateStatus($id, request());
    })->name('admin.booking.status');

    Route::delete('/admin/booking/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect('/login');
        }
        return app(BookingController::class)->delete($id, request());
    })->name('admin.booking.delete');
});
