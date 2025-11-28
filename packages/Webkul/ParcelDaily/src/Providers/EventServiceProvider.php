<?php

namespace Webkul\ParcelDaily\Providers;

use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\ParcelDaily\Jobs\StoreSelectedShipmentJob;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'checkout.cart.collect.totals.before' => [
            \Webkul\ParcelDaily\Listeners\CalculateOrderSummaryFigures::class,
        ],
        'sales.order.place.after' => [
            \Webkul\ParcelDaily\Listeners\StoreSelectedShipment::class,
        ],
        'sales.order.save.after' => [
            \Webkul\ParcelDaily\Listeners\StoreSelectedShipment::class,
        ],
        'checkout.onepage.order.save.after' => [
            \Webkul\ParcelDaily\Listeners\StoreSelectedShipment::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        // Fire once when order row is created
        Order::created(function ($order) {
            StoreSelectedShipmentJob::dispatchSync($order->id);
        });

        // Extra safety: if items are saved slightly later
        OrderItem::created(function ($item) {
            StoreSelectedShipmentJob::dispatchSync($item->order_id);
        });
    }
}
