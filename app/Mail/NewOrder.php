<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    
    public function __construct($order)
    {
        $this->order = $order;
        //
    }
    public function build()
    {
        return $this->view('frontend.emails.newOrderEmail')
        ->with([
            'order' => $this->order
        ])
        ->subject('New Order Notification');
    }
 
    }

