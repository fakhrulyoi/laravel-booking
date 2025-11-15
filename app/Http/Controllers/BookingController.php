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

    // Show homepage - CUSTOMER VIEW (Read-only calendar)
    public function index()
    {
        $bookings = $this->loadBookings();
        return view('index', compact('bookings'));
    }

    // Get all booked dates (for customer calendar)
    public function getBookedDates()
    {
        $bookings = $this->loadBookings();
        $bookedDates = array_column($bookings, 'date');

        return response()->json([
            'booked_dates' => array_values(array_unique($bookedDates))
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

    // ADMIN: Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:50',
            'email'    => 'nullable|email|max:255',
            'date'     => 'required|date',
            'time'     => 'required',
            'location' => 'required|string|max:255',
            'type'     => 'required|string|max:100',
            'message'  => 'nullable|string|max:500',
            'status'   => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $bookings = $this->loadBookings();

        // Check if date is already booked (one booking per day only)
        foreach ($bookings as $b) {
            if ($b['date'] === $request->date) {
                return back()->with('error', 'This date is already booked. Only one booking per day is allowed.');
            }
        }

        $newBooking = [
            'id'         => uniqid(),
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email ?? '',
            'date'       => $request->date,
            'time'       => $request->time,
            'location'   => $request->location,
            'type'       => $request->type,
            'message'    => $request->message ?? '',
            'status'     => $request->status,
            'created_at' => now()->toDateTimeString(),
        ];

        $bookings[] = $newBooking;
        $this->saveBookings($bookings);

        return redirect()->route('admin')->with('success', 'Booking added successfully!');
    }

    // ADMIN: Update booking
    public function update($id, Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:50',
            'email'    => 'nullable|email|max:255',
            'date'     => 'required|date',
            'time'     => 'required',
            'location' => 'required|string|max:255',
            'type'     => 'required|string|max:100',
            'message'  => 'nullable|string|max:500',
            'status'   => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $bookings = $this->loadBookings();

        foreach ($bookings as &$booking) {
            if ($booking['id'] === $id) {
                $booking['name']     = $request->name;
                $booking['phone']    = $request->phone;
                $booking['email']    = $request->email ?? '';
                $booking['date']     = $request->date;
                $booking['time']     = $request->time;
                $booking['location'] = $request->location;
                $booking['type']     = $request->type;
                $booking['message']  = $request->message ?? '';
                $booking['status']   = $request->status;
                break;
            }
        }

        $this->saveBookings($bookings);

        return redirect()->route('admin')->with('success', 'Booking updated successfully!');
    }

    // ADMIN: Update booking status
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

        return redirect()->route('admin')->with('success', 'Booking status updated successfully!');
    }

    // ADMIN: Delete booking
    public function delete($id)
    {
        $bookings = $this->loadBookings();

        $bookings = array_filter($bookings, function ($b) use ($id) {
            return $b['id'] !== $id;
        });

        $this->saveBookings(array_values($bookings));

        return redirect()->route('admin')->with('success', 'Booking deleted successfully!');
    }

    // Show login form
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin');
        }

        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string'
        ]);

        $password = $request->input('password');

        // Simple password check
        if ($password === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin');
        }

        return back()->with('error', 'Invalid password. Please try again.');
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
