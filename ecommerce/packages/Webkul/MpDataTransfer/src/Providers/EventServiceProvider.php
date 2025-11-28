<?php

namespace Webkul\MpDataTransfer\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap event services
     */
    public function boot(): void
    {
        if (core()->getConfigData('marketplace.settings.general.status')) {
            Event::listen('bagisto.admin.settings.data_transfer.imports.create.card.general.after', function ($viewRenderEventManager) {
                $viewRenderEventManager->addTemplate('mp_data_transfer::admin.settings.data-transfer.imports.create');
            });

            Event::listen('data_transfer.imports.create.after', 'Webkul\MpDataTransfer\Listeners\Importer@afterCreateImport');

            Event::listen('data_transfer.imports.update.after', 'Webkul\MpDataTransfer\Listeners\Importer@afterUpdateImport');

            Event::listen('bagisto.seller.layout.head.before', function($viewRenderEventManager) {
                $viewRenderEventManager->addTemplate('mp_data_transfer::admin.css');
            });

            Event::listen('bagisto.shop.marketplace.layout.head', function($viewRenderEventManager) {
                $viewRenderEventManager->addTemplate('mp_data_transfer::shop.css');
            });
        }
    }
}
