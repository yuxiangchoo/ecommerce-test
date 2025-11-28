<?php

namespace Webkul\ParcelDaily\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ParcelDailyServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->registerConfig();
        $this->app->register(\Webkul\ParcelDaily\Providers\EventServiceProvider::class);
    }

    public function boot() : void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'parceldaily');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'parceldaily');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/seller.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/shop.php');

        $overrideRoot = __DIR__ . '/../Resources/views/overrides';

        $this->app->booted(function () use ($overrideRoot) {
            View::prependNamespace('marketplace', $overrideRoot.'/marketplace');
            View::prependNamespace('shop', $overrideRoot.'/shop');
        });

        app('router')->aliasMiddleware(
            'pd.create-order',
            \Webkul\ParcelDaily\Http\Middleware\AutoCreateOrderOnShipment::class
        );

        app('router')->aliasMiddleware(
            'pd.cancel-shipment',
            \Webkul\ParcelDaily\Http\Middleware\CancelShipmentOnOrderCancel::class
        );

        $this->app->booted(function () {
            app('router')->matched(function ($event) {
                $route = $event->route;

                if ($route && $route->getName() === 'seller.shipments.store') {
                    $route->middleware('pd.create-order');
                }

                if ($route && $route->getName() === 'seller.orders.cancel') {
                    $route->middleware('pd.cancel-shipment');
                }
            });
        });
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/carriers.php', 'carriers'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/carriermethods.php', 'carriermethods'
        );
    }
}
