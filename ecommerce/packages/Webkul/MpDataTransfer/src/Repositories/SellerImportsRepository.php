<?php

namespace Webkul\MpDataTransfer\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\MpDataTransfer\Contracts\SellerImports;

class SellerImportsRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return SellerImports::class;
    }
}