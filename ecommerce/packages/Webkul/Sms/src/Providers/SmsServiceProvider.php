<?php

namespace Webkul\Sms\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Sms\SmsManager;

class SmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $root = dirname(__DIR__, 2); // .../packages/Webkul/Sms

        // merge package config
        if (is_file($root . '/config/sms.php')) {
            $this->mergeConfigFrom($root . '/config/sms.php', 'sms');
        }

        // bind manager
        $this->app->singleton('sms', fn ($app) => new SmsManager($app));
    }

    public function boot(): void
    {
        $root = dirname(__DIR__, 2);

        // load package routes (both in console & http so route:list works)
        if (is_file($root . '/routes/web.php'))   { $this->loadRoutesFrom($root . '/routes/web.php'); }
        if (is_file($root . '/routes/admin.php')) { $this->loadRoutesFrom($root . '/routes/admin.php'); }
        if (is_file($root . '/src/Routes/web.php'))   { $this->loadRoutesFrom($root . '/src/Routes/web.php'); }   // your zip has this
        if (is_file($root . '/routes/shop.php'))  { $this->loadRoutesFrom($root . '/routes/shop.php'); }

        // views & translations
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'sms');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'sms');

        // merge admin Configuration schema
        $system = __DIR__ . '/../Config/system.php';
        if (is_file($system)) {
            config(['core_config' => array_merge(config('core_config', []), require $system)]);
        }

        // publish config
        $this->publishes([
            $root . '/config/sms.php' => config_path('sms.php'),
        ], 'webkul-sms-config');
    }
}
