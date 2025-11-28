<?php

namespace Webkul\Paydibs\Payment;

use Webkul\Payment\Payment\Payment;
use Illuminate\Support\Facades\Storage;

class Paydibs extends Payment
{
    protected $code = 'paydibs';

    public function getRedirectUrl()
    {
        return route('paydibs.redirect');
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