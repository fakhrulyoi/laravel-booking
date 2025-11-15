<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BookingController;

// Homepage (form + calendar)
Route::get('/', [BookingController::class, 'index']);

// Handle booking form submission
Route::post('/book', [BookingController::class, 'store']);

// Login page
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login
Route::post('/login', function (Request $request) {
    $password = env('ADMIN_PASSWORD', 'admin123');

    if ($request->password === $password) {
        session(['admin_logged_in' => true]);
        return redirect('/admin');
    }

    return back()->with('error', '❌ Password salah!');
})->name('login.post');

// Logout
Route::post('/logout', function () {
    session()->forget('admin_logged_in');
    return redirect('/')->with('success', '✅ Anda telah keluar!');
})->name('logout');

// Admin page (list of bookings) - Protected
Route::middleware('admin')->group(function () {
    Route::get('/admin', [BookingController::class, 'admin'])->name('admin');
    Route::get('/delete/{date}', [BookingController::class, 'delete'])->name('delete');
});
