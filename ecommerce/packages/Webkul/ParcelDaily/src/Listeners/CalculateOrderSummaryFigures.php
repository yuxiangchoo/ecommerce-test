<?php

namespace Webkul\ParcelDaily\Listeners;

use Illuminate\Http\Request;
use Webkul\Checkout\Contracts\Cart as CartContract;

class CalculateOrderSummaryFigures
{
    private string $codMethod = 'cashondelivery';

    public function __construct(private Request $request) {}

    public function handle(CartContract $cart): void
    {
        try {
            $rate = $cart->selected_shipping_rate;
            if (! $rate || is_null($rate->cod_fee)) {
                return;
            }

            $routeName = optional($this->request->route())->getName();
            $isGetCheckout = $this->request->isMethod('GET')
                && in_array($routeName, ['shop.checkout.onepage.index', 'shop.checkout.cart.index', null], true);
            if ($isGetCheckout) {
                session()->forget('pd_cod_active');
            }

            $methodFromReq = $this->request->input('payment.method')
                ?? $this->request->input('method');
            if ($methodFromReq !== null) {
                session(['pd_cod_active' => ($methodFromReq === $this->codMethod)]);
            }

            $codActive = (bool) session('pd_cod_active', false);

            $sessionKey = 'pd_rate_snap_' . $rate->id;

            $restoreIfSnapExists = function () use ($rate, $sessionKey) {
                $snap = session($sessionKey);
                if (! $snap) return;

                $rate->price        = $snap['price'];
                $rate->base_price   = $snap['base_price'];
                if (array_key_exists('price_incl_tax', $snap)) {
                    $rate->price_incl_tax = $snap['price_incl_tax'];
                }
                if (array_key_exists('base_price_incl_tax', $snap)) {
                    $rate->base_price_incl_tax = $snap['base_price_incl_tax'];
                }
                $rate->save();
                session()->forget($sessionKey);
            };

            if (! $codActive) {
                $restoreIfSnapExists();
                return;
            }

            $flagKey = 'cod_applied_rate_' . $rate->id;
            if ($this->request->attributes->get($flagKey)) {
                return;
            }
            $this->request->attributes->set($flagKey, true);

            $cod = (float) $rate->cod_fee;

            if (! session()->has($sessionKey)) {
                session([
                    $sessionKey => [
                        'price'               => (float) $rate->price,
                        'base_price'          => (float) $rate->base_price,
                        'price_incl_tax'      => property_exists($rate, 'price_incl_tax') ? (float) $rate->price_incl_tax : null,
                        'base_price_incl_tax' => property_exists($rate, 'base_price_incl_tax') ? (float) $rate->base_price_incl_tax : null,
                    ],
                ]);
            }

            $rate->price = (float) $rate->price + $cod;
            $rate->base_price = (float) $rate->base_price + $cod;
            if (isset($rate->price_incl_tax)) {
                $rate->price_incl_tax = (float) $rate->price_incl_tax + $cod;
            }
            if (isset($rate->base_price_incl_tax)) {
                $rate->base_price_incl_tax = (float) $rate->base_price_incl_tax + $cod;
            }

            $rate->save();

        } catch (\Throwable $e) {
            $errorMessage = 'ParcelDaily COD listener error: ' . $e->getMessage();
            \Log::error($errorMessage);
        }
    }
}
