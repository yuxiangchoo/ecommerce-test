<?php

namespace Webkul\ParcelDaily\Services;

use Webkul\ParcelDaily\Models\QuoteRequest;
use Webkul\ParcelDaily\Models\CreateOrderRequest;
use Webkul\ParcelDaily\Helpers\ParcelDailyApiClient;

class ParcelDailyApiService
{
    protected ParcelDailyApiClient $client;

    public function __construct(ParcelDailyApiClient $client)
    {
        $this->client = $client;
    }

    public function getQuote(QuoteRequest $request): array
    {
        $response = $this->client->post('v1/partner/merchant/quote', $request->toArray());

        if (!isset($response['success'])) {
            return [];
        }

        return $this->mapResponseToOptions($response['success']);
    }

    public function createOrder(CreateOrderRequest $request): array
    {
        $response = $this->client->post('v1/partner/order/create', $request->toArray());

        if (!isset($response['success'])) {
            throw new \RuntimeException('CreateOrder failed: '.$response->status().' '.$response->body());
        }

        return $response->json();
    }

    public function checkoutOrder(string $orderId): array
    {
        $response = $this->client->post('v1/partner/order/pay', ['orderId' => $orderId]);

        $responseBody = $response->json();

        if (!isset($responseBody['data']) || 
            ($responseBody['data']['statusCode'] !== 200 &&
             $responseBody['data']['statusCode'] !== 400)) {
            throw new \RuntimeException('CheckoutOrder failed: '.$response->status().' '.$response->body());
        }

        return $responseBody;
    }

    public function checkOrderStatus(string $orderId): array
    {
        $response = $this->client->post('v1/partner/checkout-status', ['orderIds' => [$orderId]]);

        if ($response->status() !== 200) {
            throw new \RuntimeException('CheckOrderStatus failed: '.$response->status().' '.$response->body());
        }

        return $response->json();
    }

    public function downloadConsignPdf(string $connote): array
    {
        $response = $this->client->download('v1/partner/consign-pdf', ['connote' => $connote]);

        if (!$response->ok()) {
            throw new \RuntimeException('Waybill download failed: '.$response->status().' '.$response->body());
        }

        $contentType = strtolower($response->header('Content-Type', ''));

        if (str_contains($contentType, 'application/pdf') 
            || str_contains($contentType, 'application/octet-stream')) {
            return [
                'type'     => 'pdf',
                'content'  => $response->body(),
                'filename' => "waybill-{$connote}.pdf",
            ];
        }

        throw new \RuntimeException('Unexpected content type: '.$contentType.' | Body: '.$response->body());
    }

    public function trackOrder(string $connote): array
    {
        $response = $this->client->post('v2/partner/track', ['connote' => $connote]);

        if (!isset($response['serviceProvider'])) {
            throw new \RuntimeException('Invalid tracking response');
        }

        return $response->json();
    }

    public function cancelOrder(string $orderId): array
    {
        $response = $this->client->post('v1/partner/orders/cancel', ['orderId' => $orderId]);

        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException('CancelOrder failed: '.$response->status().' '.$response->body());
        }

        return $response->json();
    }

    protected function mapResponseToOptions(array $data): array
    {
        $options = [];
        $couriers = config('carriermethods', []); // load from config file

        foreach ($couriers as $prefix => $name) {
            $priceKey = $prefix . 'Postage';
            $codKey   = $prefix . 'Cod';

            // skip if price is empty or null
            if (empty($data[$priceKey])) {
                continue;
            }

            $options[] = [
                'service_code' => $prefix,
                'service_name' => $name,
                'price' => (float) $data[$priceKey],
                'cod_fee' => (isset($data[$codKey]) && $data[$codKey] !== '') ? (float) $data[$codKey] : 0,
                'cod_supported' => (isset($data[$codKey]) && $data[$codKey] !== '') ? true : false,
            ];
        }

        return $options;
    }
}
