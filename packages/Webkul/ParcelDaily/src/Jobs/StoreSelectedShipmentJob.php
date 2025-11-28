<?php

namespace Webkul\ParcelDaily\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Webkul\Sales\Models\Order;

class StoreSelectedShipmentJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * No ShouldQueue — runs synchronously.
     * Optional retries and backoff are now irrelevant.
     */
    public function __construct(private int $orderId) {}

    public function handle(): void
    {
        $order = Order::with(['items.product', 'payment'])->find($this->orderId);
        if (! $order) {
            return;
        }

        // make sure items are loaded
        if ($order->items->isEmpty()) {
            return;
        }

        // directly call the listener logic
        app(\Webkul\ParcelDaily\Listeners\StoreSelectedShipment::class)->handle($order);
    }
}
