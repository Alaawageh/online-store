<?php

namespace App\Listeners;

use App\Events\Create_Order;
use App\Mail\NewOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Create_Order  $event
     * @return void
     */
    public function handle(Create_Order $event)
    {
        $order = $event->order;
        Mail::to('alaawajeh29@gmail.com')->send(new NewOrder($order));
    }
}
