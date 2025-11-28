<?php

namespace Webkul\ParcelDaily\Repositories;

use Webkul\Core\Eloquent\Repository;

class OrderShipmentRepository extends Repository
{
    public function model()
    {
        return \Webkul\ParcelDaily\Models\OrderShipment::class;
    }
}
