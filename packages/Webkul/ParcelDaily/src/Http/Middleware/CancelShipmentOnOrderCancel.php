<?php

namespace Webkul\ParcelDaily\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Webkul\ParcelDaily\Models\OrderShipment;
use Webkul\ParcelDaily\Services\ParcelDailyApiService;
use Webkul\Sales\Repositories\OrderRepository;

class CancelShipmentOnOrderCancel
{
    public function __construct(
        protected ParcelDailyApiService $api,
        protected OrderRepository $orders
    ) {}

    public function handle(Request $request, Closure $next)
    {
        $orderId = (int) ($request->route('id') ?? $request->route('order_id') ?? 0);

        if (!$orderId) {
            return $next($request);
        }

        $order = $this->orders->find($orderId);
        if (!$order) {
            return $next($request);
        }

        $isParcelDaily = Str::startsWith(strtolower($order->shipping_method ?? ''), 'parceldaily')
            || Str::startsWith(strtolower($order->shipping_method ?? ''), 'parcel daily');

        if (!$isParcelDaily) {
            return $next($request);
        }

        $pd = OrderShipment::query()
            ->where('order_id', $order->id)
            ->whereNotNull('pd_order_id')
            ->latest('id')
            ->first();

        if (!$pd) {
            return $next($request);
        }

        try {
            $response = $this->api->cancelOrder($pd->pd_order_id);
            $pd->update(['pd_canceled_at' => now()]);
            session()->flash('success', trans('parceldaily::app.cancel.success'));
        } catch (\Throwable $e) {
            session()->flash('warning',
                trans('parceldaily::app.cancel.warning', ['msg' => $e->getMessage()])
            );
        }

        return $next($request);
    }
}
