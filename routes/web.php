<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Homepage (form + calendar)
Route::get('/', [BookingController::class, 'index']);

// Handle booking form submission
Route::post('/book', [BookingController::class, 'store']);

// Admin page (list of bookings)
Route::get('/admin', [BookingController::class, 'admin']);

// Delete booking
Route::get('/delete/{date}', [BookingController::class, 'delete']);
