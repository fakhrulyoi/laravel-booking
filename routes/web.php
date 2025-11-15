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

// Admin routes (protected with admin middleware)
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [BookingController::class, 'admin'])->name('admin');
    Route::get('/booking/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.booking.status');
    Route::delete('/booking/{id}', [BookingController::class, 'delete'])->name('admin.booking.delete');
});
