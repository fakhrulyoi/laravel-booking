<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    private $file = 'bookings.json';

    // Load bookings from JSON file
    private function loadBookings()
    {
        if (!file_exists(storage_path($this->file))) {
            return [];
        }

        $content = file_get_contents(storage_path($this->file));
        return json_decode($content, true) ?? [];
    }

    // Save bookings to JSON file
    private function saveBookings($bookings)
    {
        file_put_contents(storage_path($this->file), json_encode($bookings, JSON_PRETTY_PRINT));
    }

    // Show homepage with calendar + form
    public function index()
    {
        $bookings = $this->loadBookings();

        // Get upcoming bookings for display
        $upcomingBookings = array_filter($bookings, function($booking) {
            return Carbon::parse($booking['date'])->isFuture();
        });

        return view('index', compact('bookings', 'upcomingBookings'));
    }

    // Get all bookings (API endpoint)
    public function getAllBookings()
    {
        $bookings = $this->loadBookings();
        return response()->json([
            'bookings' => $bookings
        ]);
    }

    // Show admin page
    public function admin()
    {
        $bookings = $this->loadBookings();

        // Sort bookings by date (newest first)
        usort($bookings, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        // Get statistics
        $totalBookings = count($bookings);
        $upcomingBookings = count(array_filter($bookings, function($booking) {
            return Carbon::parse($booking['date'])->isFuture();
        }));
        $completedBookings = $totalBookings - $upcomingBookings;

        // Get popular photoshoot types
        $typeStats = array_count_values(array_column($bookings, 'type'));

        return view('admin', compact('bookings', 'totalBookings', 'upcomingBookings', 'completedBookings', 'typeStats'));
    }

    // Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:50',
            'email'    => 'required|email|max:255',
            'date'     => 'required|date|after:today',
            'time'     => 'required',
            'location' => 'required|string|max:255',
            'type'     => 'required|string|max:100',
            'message'  => 'nullable|string|max:500',
        ]);

        $bookings = $this->loadBookings();

        // NEW RULE: Check if date is already booked (one booking per day only)
        foreach ($bookings as $b) {
            if ($b['date'] === $request->date) {
                return back()->with('error', 'Sorry, this date is already booked. We only accept one booking per day. Please choose another date.');
            }
        }

        // Validate time slot (8 AM to 11 PM)
        $validTimes = [
            '08:00', '09:00', '10:00', '11:00', '12:00', '13:00',
            '14:00', '15:00', '16:00', '17:00', '18:00', '19:00',
            '20:00', '21:00', '22:00', '23:00'
        ];

        if (!in_array($request->time, $validTimes)) {
            return back()->with('error', 'Invalid time slot selected. Please choose a time between 8:00 AM and 11:00 PM.');
        }

        $newBooking = [
            'id'       => uniqid(),
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'date'     => $request->date,
            'time'     => $request->time,
            'location' => $request->location,
            'type'     => $request->type,
            'message'  => $request->message,
            'status'   => 'pending',
            'created_at' => now()->toDateTimeString(),
        ];

        $bookings[] = $newBooking;
        $this->saveBookings($bookings);

        // Redirect back to home page with success message
        return redirect()->route('home')->with('success', 'Your booking has been submitted successfully! We will contact you soon to confirm the details. Please note: Only one booking per day is accepted.');
    }

    // Update booking status
    public function updateStatus($id, Request $request)
    {
        $status = $request->query('status', 'confirmed');
        $bookings = $this->loadBookings();

        foreach ($bookings as &$booking) {
            if ($booking['id'] === $id) {
                $booking['status'] = $status;
                break;
            }
        }

        $this->saveBookings($bookings);

        return redirect('/admin')->with('success', 'Booking status updated successfully!');
    }

    // Delete booking by ID
    public function delete($id, Request $request)
    {
        $bookings = $this->loadBookings();

        $bookings = array_filter($bookings, function ($b) use ($id) {
            return $b['id'] !== $id;
        });

        $this->saveBookings(array_values($bookings));

        return redirect('/admin')->with('success', 'Booking deleted successfully!');
    }

    // Check available dates (API endpoint for AJAX calls)
    public function checkAvailability(Request $request)
    {
        $date = $request->query('date');
        $bookings = $this->loadBookings();

        $isBooked = false;
        foreach ($bookings as $booking) {
            if ($booking['date'] === $date) {
                $isBooked = true;
                break;
            }
        }

        return response()->json([
            'available' => !$isBooked,
            'date' => $date
        ]);
    }

    // Get all booked dates (API endpoint for calendar)
    public function getBookedDates()
    {
        $bookings = $this->loadBookings();
        $bookedDates = array_column($bookings, 'date');

        return response()->json([
            'booked_dates' => array_values(array_unique($bookedDates))
        ]);
    }

    // Show login form
    public function showLogin()
    {
        // Redirect to admin if already logged in
        if (session('admin_logged_in')) {
            return redirect('/admin');
        }

        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $password = $request->input('password');

        // Simple password check (in production, use proper authentication)
        if ($password === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect('/admin')->with('success', 'Welcome to admin dashboard!');
        }

        return back()->with('error', 'Invalid password. Please try again.');
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_logged_in');
        session()->flush();
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
