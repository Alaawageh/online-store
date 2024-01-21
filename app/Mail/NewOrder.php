<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $detials;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detials)
    {
        $this->detials = $detials;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Order')
            ->view('frontend.emails.newOrderEmail', [
                'details' => $this->detials,
            ]);
    }
}
