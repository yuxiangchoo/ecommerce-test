<?php

namespace Webkul\ParcelDaily\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Webkul\Inventory\Models\InventorySource;
use Webkul\ParcelDaily\Models\Address;
use Webkul\ParcelDaily\Models\CreateOrderRequest;
use Webkul\ParcelDaily\Models\OrderShipment;
use Webkul\ParcelDaily\Services\ParcelDailyApiService;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Marketplace\Repositories\OrderRepository as SellerOrderRepo;

class AutoCreateOrderOnShipment
{
    public function __construct(
        private ParcelDailyApiService $apiService,
        private OrderRepository $ordersRepo,
        private SellerOrderRepo $sellerOrdersRepo,
    ) {}

    public function handle(Request $request, Closure $next)
    {
        try {
            $routeName = optional($request->route())->getName();
            if ($routeName !== 'seller.shipments.store') {
                return $next($request);
            }

            $sellerOrderId = (int) $request->route('id');
            $sellerId = auth()->guard('seller')->user()->id ?? null;
            $sellerOrder = $this->sellerOrdersRepo->findOneWhere([
                'order_id' => $sellerOrderId,
                'marketplace_seller_id' => $sellerId,
            ]);
            if (!$sellerOrder) {
                return $next($request);
            }

            $order = $this->ordersRepo->find($sellerOrderId);
            if (!$order) {
                return $next($request);
            }

            $method = (string) $order->shipping_method; 
            if (!Str::startsWith($method, 'parceldaily')) {
                return $next($request);
            }

            $mode = $request->string('pd_mode')->toString();
            if (!in_array($mode, ['pickup', 'dropoff'], true)) {
                return back()->withErrors(['pd_mode' => trans('parceldaily::app.create-shipment.pd-mode-required')])->withInput();
            }

            $sourceId = (int) data_get($request->input('shipment'), 'source');
            /** @var InventorySource|null $src */
            $src = $sourceId ? InventorySource::query()->find($sourceId) : null;
            if (!$src) {
                return back()->withErrors(['general' => trans('parceldaily::app.create-shipment.invalid-inventory-source')])->withInput();
            }

            $pickup = new Address(
                fullName: $src->contact_name ?: ($src->name ?: 'Sender'),
                countryCode: ($src->country == 'MY') ? '+60' : '+65',
                phone: $this->formatPhoneNo($src->contact_number),
                email: $src->contact_email,
                line1: $src->street ?? '',
                line2: '',
                city: $src->city,
                postcode: $src->postcode,
                state: $src->state,
                country: ($src->country == 'MY') ? 'Malaysia' : 'Singapore',
            );

            $ship = $order->shipping_address;
            if (!$ship) {
                return back()->withErrors(['pd_mode' => 'Please select Shipment Mode.'])->withInput();
            }

            $client = new Address(
                fullName: trim(($ship->first_name ?? '') .' '. ($ship->last_name ?? '')),
                countryCode: ($ship->country == 'MY') ? '+60' : '+65',
                phone: $this->formatPhoneNo($ship->phone),
                email: $order->customer_email,
                line1: $ship->address ?? '',
                line2: '',
                city: $ship->city,
                postcode: $ship->postcode,
                state: $ship->state,
                country: ($ship->country === 'MY') ? 'Malaysia' : 'Singapore',
            );

            $providerKey = Str::after($method, 'parceldaily_');
            $providerMap = config('parceldaily.provider_map', []);
            $serviceProvider = $providerMap[$providerKey] ?? $providerKey;

            $kg = max(0.1, (float) $sellerOrder->items->sum(function ($soi) {
                $w = (float) ($soi->item->weight ?? 0);
                $q = (float) ($soi->item->qty_to_ship ?? $soi->item->qty_ordered ?? 1);
                return $w * $q;
            }));

            $quantity = (int) $sellerOrder->items->sum(function ($soi) {
                return (int) ($soi->item->qty_to_ship ?? $soi->item->qty_ordered ?? 1);
            });

            $pdRow = OrderShipment::query()->where([
                'order_id' => $order->id,
                'seller_id' => $sellerOrder->marketplace_seller_id,
            ])->first();

            $price = $pdRow ? (float) round($pdRow->effective_price, 2) : 0.00;
            $cod = ($pdRow && $pdRow->is_cod_payment) ? (float) round($order->grand_total, 2) : null;

            $content = substr((string) $sellerOrder->items->pluck('item.name')->filter()->implode(', '), 0, 50);
            $contentValue  = (int) round((float) $sellerOrder->items->sum(function ($soi) {
                return (float) ($soi->item->price ?? 0) * (float) ($soi->item->qty_to_ship ?? $soi->item->qty_ordered ?? 1);
            }));

            $createOrderRequest = new CreateOrderRequest(
                serviceProvider: $serviceProvider,
                pickupAddress: $pickup,
                clientAddress: $client,
                kg: round($kg, 3),
                quantity: $quantity,
                price: round($price, 2),
                cod: $cod !== null ? round($cod, 2) : null,
                content: $content ?: ('Order '.$order->increment_id),
                content_value: $contentValue,
                isDropoff: ($mode === 'dropoff'),
            );

            $orderId = null;
            $connote = null;
            $reference = null;

            $createOrderResponse = $this->apiService->createOrder($createOrderRequest);
            $checkoutOrderResponse = $this->apiService->checkoutOrder($createOrderResponse['success']['objectId']);
            if ($checkoutOrderResponse['data']['statusCode'] == 400) {
                $checkOrderStatusResponse = $this->apiService->checkOrderStatus($createOrderResponse['success']['objectId']);
                if ($checkOrderStatusResponse['data'][0]['consign_no'] == null) {
                    throw new \RuntimeException('consign_no is null value');
                }

                $orderId = $checkOrderStatusResponse['data'][0]['orderId'];
                $connote = $checkOrderStatusResponse['data'][0]['consign_no'];
                $reference = $checkOrderStatusResponse['data'][0]['reference'];
            }
            else {
                $orderId = $checkoutOrderResponse['data']['orderId'];
                $connote = $checkoutOrderResponse['data']['connote'];
                $reference = $checkoutOrderResponse['data']['reference'];
            }

            OrderShipment::query()->where([
                'order_id' => $order->id,
                'seller_id' => $sellerOrder->marketplace_seller_id,
            ])->update([
                'pd_order_id' => $orderId,
                'connote' => $connote,
                'reference' => $reference
            ]);

            $shipmentData = (array) $request->input('shipment', []);
            $shipmentData['carrier_title'] = $carrierTitle = $pdRow?->service_name ?: (ucfirst($serviceProvider) . ' (PD)');
            $shipmentData['track_number']  = $connote;

            $request->merge(['shipment' => $shipmentData]);
            $request->attributes->set('pd_checkout', [
                'orderId'   => $orderId,
                'connote'   => $connote,
                'reference' => $reference,
            ]);

        } catch (\Throwable $e) {
            return back()
                ->withErrors(['general' => 'ParcelDaily Create Order failed: '.$e->getMessage()])
                ->withInput();
        }


        return $next($request);
    }

    public function formatPhoneNo($phone)
    {
        $phone = preg_replace('/[\s\-()]/', '', $phone);

        if (strpos($phone, '+60') === 0) {
            $phone = substr($phone, 3);
        } elseif (strpos($phone, '60') === 0) {
            $phone = substr($phone, 2);
        } elseif (strpos($phone, '0') === 0) {
            $phone = substr($phone, 1);
        }

        return $phone;
    }
    
}
