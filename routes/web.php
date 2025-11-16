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
// ADMIN ROUTES (NO LOGIN REQUIRED)
// ============================================

// Admin Dashboard - Direct Access
Route::get('/admin', [BookingController::class, 'admin'])->name('admin');

// Add New Booking
Route::post('/admin/booking', [BookingController::class, 'store'])->name('admin.booking.store');

// Update Booking
Route::put('/admin/booking/{id}', [BookingController::class, 'update'])->name('admin.booking.update');

// Quick Status Update
Route::get('/admin/booking/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.booking.status');

// Delete Booking
Route::delete('/admin/booking/{id}', [BookingController::class, 'delete'])->name('admin.booking.delete');
