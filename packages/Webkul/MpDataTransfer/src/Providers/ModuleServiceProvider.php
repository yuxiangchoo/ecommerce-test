<?php

namespace Webkul\MpDataTransfer\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    protected $models = [
        \Webkul\MpDataTransfer\Models\SellerImports::class,
    ];
}
