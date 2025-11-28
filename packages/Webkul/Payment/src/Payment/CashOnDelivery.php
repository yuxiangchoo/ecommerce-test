<?php

namespace Webkul\Payment\Payment;

use Illuminate\Support\Facades\Storage;

class CashOnDelivery extends Payment
{
    /**
     * Payment method code.
     *
     * @var string
     */
    protected $code = 'cashondelivery';

    /**
     * Get redirect url.
     *
     * @return string
     */
    public function getRedirectUrl() {}

    /**
     * Is available.
     *
     * @return bool
     */
    public function isAvailable()
    {
        if (! $this->cart) {
            $this->setCart();
        }

        if (! $this->getConfigData('active') || ! $this->cart?->haveStockableItems()) {
            return false;
        }

        $shippingMethod = (string) ($this->cart->shipping_method ?? '');
        if ($shippingMethod === '') {
            return false;
        }

        $parts = explode('_', $shippingMethod, 2);
        $serviceCode = $parts[1] ?? '';

        $cacheKey = 'pd_rates_' . $this->cart->id;
        $cache = \Illuminate\Support\Facades\Cache::get($cacheKey);

        if (! $cache || ! isset($cache['cod_supported_map'][$serviceCode])) {
            return false;
        }

        $codSupported = (bool) $cache['cod_supported_map'][$serviceCode];

        return $codSupported;
    }


    /**
     * Get payment method image.
     *
     * @return array
     */
    public function getImage()
    {
        $url = $this->getConfigData('image');

        return $url ? Storage::url($url) : bagisto_asset('images/cash-on-delivery.png', 'shop');
    }
}
