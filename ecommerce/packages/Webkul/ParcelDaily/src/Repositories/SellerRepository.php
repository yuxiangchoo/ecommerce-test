<?php

namespace Webkul\ParcelDaily\Repositories;

use Illuminate\Support\Facades\DB;

class SellerRepository
{
    /**
     * Get seller IDs for all items in an order.
     * 
     * @param  int   $orderId
     * @return array order_item_id => seller_id
     */
    public function getItemSellerMap(int $orderId): array
    {
        return DB::table('order_items as oi')
            ->leftJoin('products as p', 'p.id', '=', 'oi.product_id')
            ->leftJoin('marketplace_products as mp', 'mp.product_id', '=', 'oi.product_id')
            ->leftJoin('marketplace_products as mp_parent', 'mp_parent.product_id', '=', 'p.parent_id')
            ->where('oi.order_id', $orderId)
            ->selectRaw(
                'oi.id as order_item_id, COALESCE(mp.marketplace_seller_id, mp_parent.marketplace_seller_id, 0) as seller_id'
            )
            ->pluck('seller_id', 'order_item_id')
            ->toArray();
    }
}
