<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;


class SendReservationConfirmationEmail implements ShouldQueue
{
    
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $reservation;
    /**
     * Create a new job instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Execute the job.
     */
    public function handle()
{
    $reservation = $this->reservation;
    $bookingID = 'BOOK' . uniqid();
    Mail::to($reservation->email)->send(new ReservationConfirmation($bookingID));
}
}
