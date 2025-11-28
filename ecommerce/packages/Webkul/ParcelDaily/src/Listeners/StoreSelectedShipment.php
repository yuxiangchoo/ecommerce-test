<?php

namespace Webkul\ParcelDaily\Listeners;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Webkul\ParcelDaily\Repositories\SellerRepository;
use Webkul\ParcelDaily\Repositories\OrderShipmentRepository;
use Webkul\Sales\Contracts\Order as OrderContract;

class StoreSelectedShipment
{
    public function __construct(
        protected SellerRepository $sellers,
        protected OrderShipmentRepository $repo
    ) {}

    public function handle($order): void
    {
        if (! $order instanceof OrderContract) {
            return;
        }

        $order->loadMissing('items.product');

        $cartId = $order->cart_id;
        if (! $cartId) {
            return;
        }

        $snap = Cache::get('pd_rates_' . $cartId);
        if (! $snap) {
            return;
        }

        $sellerQuotes = $snap['seller_quotes'] ?? [];
        $currency = $snap['currency'] ?? $order->order_currency_code;

        $shippingMethod = (string) $order->shipping_method;
        $serviceCode = Str::contains($shippingMethod, '_') ? Str::after($shippingMethod, '_') : $shippingMethod;

        $paymentMethod = $order->payment?->method;
        $isCodPayment = ($paymentMethod === 'cashondelivery');

        $itemSeller = $this->sellers->getItemSellerMap($order->id);

        $sellerIds = [];
        foreach ($order->items as $item) {
            $sellerIds[(int)($itemSeller[$item->id] ?? 0)] = true; // 0 = admin
        }

        foreach (array_keys($sellerIds) as $sellerId) {
            $opt = $sellerQuotes[$sellerId][$serviceCode] ?? null;
            if (!$opt) {
                continue;
            }

            $this->repo->updateOrCreate(
                ['order_id' => $order->id, 'seller_id' => $sellerId],
                [
                    'service_code' => $serviceCode,
                    'service_name' => $opt['service_name'] ?? $serviceCode,
                    'price' => (float)($opt['price'] ?? 0),
                    'cod_fee' => isset($opt['cod_fee']) ? (float)$opt['cod_fee'] : null,
                    'cod_supported' => (bool)($opt['cod_supported'] ?? false),
                    'is_cod_payment' => $isCodPayment,
                    'currency' => $currency,
                    'quote' => $opt,
                ]
            );
        }

        Cache::forget('pd_rates_' . $cartId);
    }
}
