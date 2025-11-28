<?php

namespace Webkul\ParcelDaily\Models;

use Illuminate\Database\Eloquent\Model;

class OrderShipment extends Model
{
    protected $table = 'parceldaily_order_shipments';
    protected $guarded = [];
    protected $casts = [
        'quote' => 'array', 
        'cod_supported' => 'boolean', 
        'is_cod_payment' => 'boolean'
    ];

    public function getEffectivePriceAttribute(): float
    {
        $base = (float) ($this->price ?? 0);
        $fee  = (float) ($this->cod_fee ?? 0);

        return $this->is_cod_payment ? $base + $fee : $base;
    }
}
