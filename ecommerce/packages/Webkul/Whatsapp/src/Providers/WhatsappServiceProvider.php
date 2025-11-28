<?php

namespace Webkul\Whatsapp\Providers;

use Illuminate\Support\ServiceProvider;

class WhatsappServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $root = dirname(__DIR__, 2);

        // IMPORTANT: merge your system.php into 'core' (NOT 'core_config')
        $pkgSystem = __DIR__ . '/../Config/system.php';
        if (is_file($pkgSystem)) {
            $this->mergeConfigFrom($pkgSystem, 'core');
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Load routes (if exists)
        $root = dirname(__DIR__, 2);

        if (is_file($root . '/routes/web.php')) {
            $this->loadRoutesFrom($root . '/routes/web.php');
        }

        // Load views with "whatsapp::" namespace
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'whatsapp');

        // Publish assets
        $this->publishes([
            __DIR__ . '/../Resources/assets' => public_path('vendor/whatsapp'),
        ], 'public');

        // Load translations
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'whatsapp');
    }
}
