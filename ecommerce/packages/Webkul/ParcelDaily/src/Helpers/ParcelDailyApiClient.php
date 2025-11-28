<?php

namespace Webkul\ParcelDaily\Helpers;

use Illuminate\Support\Facades\Http;

class ParcelDailyApiClient
{
    protected string $baseUrl;
    protected string $token;
    protected string $merchantId;

    public function __construct()
    {
        $this->baseUrl = core()->getConfigData('sales.carriers.parceldaily.base_url');
        $this->token = core()->getConfigData('sales.carriers.parceldaily.token');
        $this->merchantId = core()->getConfigData('sales.carriers.parceldaily.merchant_id');
    }

    public function get(string $endpoint, array $queryParams = [])
    {
        \Log::info('[GET] ParcelDaily request', [
                    'baseUrl' => $this->baseUrl,
                    'endpoint' => $endpoint,
                    'query' => $queryParams
        ]);

        $response =  Http::withHeaders([
            'Content-Type'  => 'application/json',
            'token' => $this->token,
            'merchant-id' => $this->merchantId
        ])
        ->timeout(60)
        ->get($this->baseUrl . $endpoint, $queryParams);

        \Log::info('[GET] ParcelDaily response', [
                    'response' => $response->json(),
        ]);
        
        return $response;
    }

    public function post(string $endpoint, array $payload)
    {
        \Log::info('[POST] ParcelDaily request', [
                    'baseUrl' => $this->baseUrl,
                    'endpoint' => $endpoint,
                    'query' => $payload
        ]);

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'token' => $this->token,
            'merchantid' => $this->merchantId
        ])
        ->timeout(seconds: 60)
        ->post($this->baseUrl . $endpoint, $payload);

        \Log::info('[POST] ParcelDaily response', [
            'response' => $response->json(),
        ]);

        return $response;
    }

    public function download(string $endpoint, array $payload)
    {
        \Log::info('[DOWNLOAD] ParcelDaily request', [
            'baseUrl'  => $this->baseUrl,
            'endpoint' => $endpoint,
            'body'     => $payload,
        ]);

        $url = rtrim($this->baseUrl, '/').'/'.ltrim($endpoint, '/');

        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'token'        => $this->token,
                'merchantid'   => $this->merchantId,
            ])
            ->asJson()
            ->accept('application/pdf')
            ->timeout(60)
            ->post($url, $payload);

        return $response;
    }


}
