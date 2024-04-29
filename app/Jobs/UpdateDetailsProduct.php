<?php

namespace App\Jobs;

use App\Enums\OrderEnum;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateDetailsProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderId;

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
     public function handle()
    {
        $order = Order::find($this->orderId);
        if ($order && $order->status == OrderEnum::in_progress) {
            foreach ($order->products as $product) {
                $product->qty -= $product->pivot->qty;
                $product->save();
                if ($product->qty == 1) {
                    $product->status = false;
                    $product->save();
                }
            }
        }
    }
}
