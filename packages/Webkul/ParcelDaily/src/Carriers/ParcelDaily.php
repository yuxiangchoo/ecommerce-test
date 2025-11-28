<?php

namespace Webkul\ParcelDaily\Carriers;

use Illuminate\Support\Facades\Cache;
use Webkul\Checkout\Facades\Cart;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Shipping\Carriers\AbstractShipping;
use Webkul\Marketplace\Repositories\SellerRepository;
use Webkul\ParcelDaily\Services\ParcelDailyApiService;
use Webkul\ParcelDaily\Models\QuoteRequest;
use Webkul\Inventory\Repositories\InventorySourceRepository;

class ParcelDaily extends AbstractShipping
{
    /**
     * Shipping method carrier code.
     *
     * @var string
     */
    protected $code = 'parceldaily';

    /**
     * Shipping method code.
     *
     * @var string
     */
    protected $method = 'parceldaily_parceldaily';

    /**
     * @var ParcelDailyApiService
     */
    protected $apiService;

    /**
     * @var SellerRepository
     */
    protected $sellerRepo;

    public function __construct()
    {
        $this->apiService = app(ParcelDailyApiService::class);
        $this->sellerRepo = app(SellerRepository::class);
    }

    /**
     * Calculate rate for parceldaily.
     *
     * @return \Webkul\Checkout\Models\CartShippingRate|false
     */
    public function calculate()
    {
        if (! $this->isAvailable()) {
            return false;
        }

        return $this->getRate();
    }

    /**
     * Get rate.
     */
    public function getRate()
    {
        $rates = [];
        
        try {
            $cart = Cart::getCart();

            $destination = $cart->shipping_address ?: $cart->billing_address;
            if (! $destination) {
                return [];
            }

            $groups = [];

            // 1. Group item by seller.
            foreach ($cart->items as $item) {
                $sellerId = (int) data_get($item->additional, 'seller_info.seller_id', 0);
                $quantity = (int) ($item->quantity ?? 1);
                $weight   = (float) ($item->weight ?? 0) * $quantity;
                $price    = (float) ($item->base_total ?? $item->total ?? 0);

                if (! isset($groups[$sellerId])) {
                    $groups[$sellerId] = ['weight' => 0.0, 'subtotal' => 0.0];
                }

                $groups[$sellerId]['weight'] += $weight;
                $groups[$sellerId]['subtotal'] += $price;
            }

            $sellerQuotes = [];
            foreach ($groups as $sellerId => $group) {
                // 2. Get seller's shipping origin.
                [$originPostcode, $originCountryName] = $this->resolveSellerOrigin($sellerId);

                if ($originPostcode === '' && $originCountryName === '') {
                    throw new \RuntimeException("Seller does not have an active inventory source configured.");
                }

                $destPostcode = $destination->postcode;
                $destCountryName = $this->countryCodeToName($destination->country);

                // 3. Call Quote API by seller.
                $request = new QuoteRequest(
                    origin: $originPostcode,
                    destination: $destPostcode,
                    weight: max(0.1, (float) $group['weight']),
                    originCountry: $originCountryName,
                    destinationCountry: $destCountryName,
                    codAmount: (float) $group['subtotal']
                );

                $options = $this->apiService->getQuote($request);

                $sellerQuotes[$sellerId] = [];
                foreach ($options as $opt) {
                    $code = $opt['service_code'];
                    $sellerQuotes[$sellerId][$code] = $opt;
                }
            }

            // 4. Total up rates.
            $serviceSets  = array_map(fn ($m) => array_keys($m), $sellerQuotes);
            $commonCodes  = array_shift($serviceSets) ?? [];
            foreach ($serviceSets as $codes) {
                $commonCodes = array_values(array_intersect($commonCodes, $codes));
            }

            $totals = []; 
            $codSupportByCode = []; 
            foreach ($commonCodes as $code) {
                $sumPrice    = 0.0;
                $sumCod      = 0.0;
                $allCod      = true;
                $serviceName = null;

                foreach ($sellerQuotes as $opts) {
                    $opt = $opts[$code];

                    $sumPrice += (float) $opt['price'];

                    $codSupported = ($opt['cod_supported'] === true);
                    $allCod = $allCod && $codSupported;

                    if ($codSupported) {
                        $sumCod += (float) $opt['cod_fee'];
                    }

                    $serviceName ??= $opt['service_name'];
                }

                $totals[$code] = [
                    'service_name'  => $serviceName ?? $code,
                    'price'         => $sumPrice,
                    'cod_supported' => $allCod,
                    'cod_fee'       => $sumCod,
                ];

                $codSupportByCode[$code] = $allCod; 
            }

            $this->cacheSellerQuotesForCheckout(
                cartId: $cart->id,
                sellerQuotes: $sellerQuotes,
                commonCodes: $commonCodes,
                destination: $destination,
                currency: core()->getCurrentCurrencyCode(),
                codSupportByCode: $codSupportByCode   
            );

            $rates = [];
            foreach ($totals as $code => $meta) {
                $rate = new \Webkul\Checkout\Models\CartShippingRate;

                $rate->carrier            = $this->getCode();
                $rate->carrier_title      = $this->getConfigData('title');
                $rate->method             = $this->getCode() . '_' . $code;
                $rate->method_title       = $meta['service_name'];
                $rate->method_description = $this->getConfigData('title')
                    . ' | '
                    . ($meta['cod_supported']
                        ? ('COD Fee: ' . core()->getCurrentCurrency()->symbol . ' ' . number_format($meta['cod_fee'], 2))
                        : 'No COD Service');
                $rate->cod_fee   = $meta['cod_supported'] ? $meta['cod_fee'] : null;
                $rate->price     = $meta['price'];
                $rate->base_price= $meta['price'];

                $rates[] = $rate;
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            \Log::error('ParcelDaily Rate Calculation Error: ' . $errorMessage);
        }

        return $rates;
    }

    protected function resolveSellerOrigin(int $sellerId): array
    {
        $sellerInventory = app(InventorySourceRepository::class)
            ->findWhere(['status' => 1, 'vendor_id' => $sellerId])
            ->sortBy('priority')
            ->first();

        if ($sellerInventory) {
            $postcode = (string) ($sellerInventory->postcode ?? '');
            $country  = $this->countryCodeToName($sellerInventory->country ?? config('app.default_country'));
            return [$postcode, $country];
        }

        return ['', ''];
    }

    protected function countryCodeToName(?string $code): string
    {
        $code = strtoupper((string) $code);
        return match ($code) {
            'MY' => 'Malaysia',
            'SG' => 'Singapore',
            default => $code, // or map via a proper country list
        };
    }

    private function cacheSellerQuotesForCheckout(string $cartId, array $sellerQuotes, array $commonCodes, $destination, string $currency, array $codSupportByCode): void
    {
        Cache::put('pd_rates_' . $cartId, [
            'seller_quotes' => $sellerQuotes,
            'common_codes'  => array_values($commonCodes),
            'cod_supported_map' => $codSupportByCode,
            'destination'   => [
                'postcode' => $destination->postcode,
                'country'  => $this->countryCodeToName($destination->country),
            ],
            'currency'      => $currency,
        ], now()->addHours(2));
    }

}
