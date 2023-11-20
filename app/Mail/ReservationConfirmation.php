<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingId; // Add a public property to store the booking ID

    /**
     * Create a new message instance.
     *
     * @param string $bookingId
     */
    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('confirmation')
                    ->subject('Reservation Confirmation')
                    ->with(['bookingId' => $this->bookingId]); // Pass the booking ID to the view
    }
}
