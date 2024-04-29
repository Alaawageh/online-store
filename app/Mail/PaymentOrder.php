<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $detials;
    public function __construct($detials)
    {
        $this->detials = $detials;
    }

    public function build()
    {
        return $this->subject('New Order')
            ->view('frontend.emails.paymentSuccessEmail', [
                'details' => $this->detials,
            ]);
    }
}
