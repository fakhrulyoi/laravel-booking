<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('index', compact('bookings'));
    }

    // Show admin page
    public function admin()
    {
        $bookings = $this->loadBookings();
        return view('admin', compact('bookings'));
    }

    // Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:50',
            'email'    => 'required|email|max:255',
            'date'     => 'required|date',
            'time'     => 'required',
            'location' => 'required|string|max:255',
            'type'     => 'required|string|max:100',
        ]);

        $bookings = $this->loadBookings();

        // Prevent double booking (same date & time)
        foreach ($bookings as $b) {
            if ($b['date'] === $request->date && $b['time'] === $request->time) {
                return back()->with('error', '❌ Masa ini sudah ditempah!');
            }
        }

        $newBooking = [
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'date'     => $request->date,
            'time'     => $request->time,
            'location' => $request->location,
            'type'     => $request->type,
        ];

        $bookings[] = $newBooking;
        $this->saveBookings($bookings);

        return redirect('/')->with('success', '✅ Tempahan berjaya dihantar!');
    }

    // Delete booking by date & time
    public function delete($date, Request $request)
    {
        $time = $request->query('time');
        $bookings = $this->loadBookings();

        $bookings = array_filter($bookings, function ($b) use ($date, $time) {
            return !($b['date'] === $date && $b['time'] === $time);
        });

        $this->saveBookings(array_values($bookings));

        return redirect('/admin')->with('success', '✅ Tempahan berjaya dipadam!');
    }
}
