<?php

namespace Webkul\MpDataTransfer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\DataTransfer\Models\ImportProxy;
use Webkul\Marketplace\Models\SellerProxy;
use Webkul\MpDataTransfer\Contracts\SellerImports as SellerImportsContract;

class SellerImports extends Model implements SellerImportsContract
{
    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * Column fillable.
     */
    protected $fillable = [
        'seller_id',
        'import_id',
    ];

    /**
     * Get the seller that owns the import.
     */
    public function seller_import()
    {
        return $this->belongsTo(SellerProxy::modelClass(), 'seller_id');
    }

    /**
     * Get the import profile that owns the seller.
     */
    public function import()
    {
        return $this->belongsTo(ImportProxy::modelClass(), 'import_id');
    }
}