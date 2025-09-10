<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $forAdmin;

    public function __construct($booking, $forAdmin = false)
    {
        $this->booking = $booking;
        $this->forAdmin = $forAdmin;
    }

    public function build()
    {
        if ($this->forAdmin) {
            return $this->subject('📸 New Booking Received')
                        ->view('emails.adminBooking');
        } else {
            return $this->subject('📸 Your Booking Confirmation - Chap Gallery')
                        ->view('emails.clientBooking');
        }
    }
}
