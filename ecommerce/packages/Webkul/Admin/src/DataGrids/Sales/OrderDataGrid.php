<?php

namespace Webkul\Admin\DataGrids\Sales;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Repositories\OrderRepository;

class OrderDataGrid extends DataGrid
{
    protected $useNewExport = false;
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('orders')
            ->distinct()
            ->leftJoin('addresses as order_address_shipping', function ($leftJoin) {
                $leftJoin->on('order_address_shipping.order_id', '=', 'orders.id')
                    ->where('order_address_shipping.address_type', OrderAddress::ADDRESS_TYPE_SHIPPING);
            })
            ->leftJoin('addresses as order_address_billing', function ($leftJoin) {
                $leftJoin->on('order_address_billing.order_id', '=', 'orders.id')
                    ->where('order_address_billing.address_type', OrderAddress::ADDRESS_TYPE_BILLING);
            })

            ->leftJoin('order_items', function ($join) {
                $join->on('orders.id', '=', 'order_items.order_id')
                    ->where('order_items.qty_ordered', '>', 0);
            })
            ->leftJoin('marketplace_sellers', function ($join) {
                $join->on('marketplace_sellers.id', '=', DB::raw("JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.seller_info.seller_id'))"));
            })
            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
            ->leftJoin('product_flat as product_flat_en', function ($join) {
                $join->on('products.id', '=', 'product_flat_en.product_id')
                    ->where('product_flat_en.locale', '=', 'en');
            })
            ->leftJoin('product_flat as product_flat_cn', function ($join) {
                $join->on('products.id', '=', 'product_flat_cn.product_id')
                    ->where('product_flat_cn.locale', '=', 'zh_cn');
            })
            ->leftJoin('order_items as items2', 'items2.parent_id', '=', 'order_items.id')
            ->leftJoin('order_payment', 'orders.id', '=', 'order_payment.order_id')
            ->leftJoin('parceldaily_order_shipments', function ($join) {
                $join->on('orders.id', '=', 'parceldaily_order_shipments.order_id')
                     ->on('parceldaily_order_shipments.seller_id', '=', 'marketplace_sellers.id');
            })
            ->select(
                'orders.id',
                'order_payment.method',
                'orders.increment_id',
                'orders.base_grand_total',
                'orders.created_at',
                'order_address_shipping.phone',
                'orders.status',
                'orders.customer_email',
                'orders.cart_id as items',
                'marketplace_sellers.name as seller_name',
                'parceldaily_order_shipments.connote as tracking_number',
                'parceldaily_order_shipments.service_name as courier_company',
                'order_address_shipping.state as shipping_state',
                'order_items.name as item_name',
                'product_flat_en.name as item_name_en',
                'product_flat_cn.name as item_name_cn',
                DB::raw('CASE WHEN items2.sku IS NOT NULL THEN items2.sku ELSE order_items.sku END AS item_sku'),
                'order_items.qty_ordered as item_qty',
                'order_items.total as item_total_price',
                // Color
                DB::raw("
                    CASE
                        WHEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[0].attribute_name')) = 'Color'
                            THEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[0].option_label'))
                        WHEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[1].attribute_name')) = 'Color'
                            THEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[1].option_label'))
                    END AS color_label
                "),
                // Size
                DB::raw("
                    CASE
                        WHEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[0].attribute_name')) = 'Size'
                            THEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[0].option_label'))
                        WHEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[1].attribute_name')) = 'Size'
                            THEN JSON_UNQUOTE(JSON_EXTRACT(order_items.additional, '$.attributes[1].option_label'))
                    END AS size_label
                "),
                DB::raw('CONCAT('.DB::getTablePrefix().'order_address_shipping.address, ", ", '.DB::getTablePrefix().'order_address_shipping.postcode,", ", '.DB::getTablePrefix().'order_address_shipping.state,", ", '.DB::getTablePrefix().'order_address_shipping.country) as address'),
                DB::raw('CONCAT('.DB::getTablePrefix().'orders.customer_first_name, " ", '.DB::getTablePrefix().'orders.customer_last_name) as full_name'));
        $this->addFilter('full_name', DB::raw('CONCAT('.DB::getTablePrefix().'orders.customer_first_name, " ", '.DB::getTablePrefix().'orders.customer_last_name)'));
        $this->addFilter('created_at', 'orders.created_at');

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'increment_id',
            'label'      => trans('admin::app.sales.orders.index.datagrid.order-id'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'seller_name',
            'label'      => trans('admin::app.sales.orders.index.datagrid.seller-name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'           => 'created_at',
            'label'           => trans('admin::app.sales.orders.index.datagrid.date'),
            'type'            => 'date',
            'filterable'      => true,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'              => 'status',
            'label'              => trans('admin::app.sales.orders.index.datagrid.status'),
            'type'               => 'string',
            'searchable'         => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.to-process'),
                    'value' => Order::STATUS_TO_PROCESS,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.processing'),
                    'value' => Order::STATUS_PROCESSING,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.completed'),
                    'value' => Order::STATUS_COMPLETED,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.canceled'),
                    'value' => Order::STATUS_CANCELED,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.closed'),
                    'value' => Order::STATUS_CLOSED,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.pending'),
                    'value' => Order::STATUS_PENDING,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.pending-payment'),
                    'value' => Order::STATUS_PENDING_PAYMENT,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.payment-failed'),
                    'value' => Order::STATUS_PAYMENT_FAILED,
                ],
                [
                    'label' => trans('admin::app.sales.orders.index.datagrid.fraud'),
                    'value' => Order::STATUS_FRAUD,
                ],
            ],
            'sortable'   => true,
            'closure'    => function ($row) {
                switch ($row->status) {
                    case Order::STATUS_TO_PROCESS:
                        return '<p class="label-pending">'.trans('admin::app.sales.orders.index.datagrid.to-process').'</p>';

                    case Order::STATUS_PROCESSING:
                        return '<p class="label-processing">'.trans('admin::app.sales.orders.index.datagrid.processing').'</p>';
                    
                    case Order::STATUS_COMPLETED:
                        return '<p class="label-active">'.trans('admin::app.sales.orders.index.datagrid.completed').'</p>';

                    case Order::STATUS_CANCELED:
                        return '<p class="label-canceled">'.trans('admin::app.sales.orders.index.datagrid.canceled').'</p>';

                    case Order::STATUS_CLOSED:
                        return '<p class="label-closed">'.trans('admin::app.sales.orders.index.datagrid.closed').'</p>';

                    case Order::STATUS_PENDING:
                        return '<p class="label-pending">'.trans('admin::app.sales.orders.index.datagrid.pending').'</p>';

                    case Order::STATUS_PENDING_PAYMENT:
                        return '<p class="label-pending">'.trans('admin::app.sales.orders.index.datagrid.pending-payment').'</p>';
                   
                    case Order::STATUS_PAYMENT_FAILED:
                        return '<p class="label-canceled">'.trans('admin::app.sales.orders.index.datagrid.payment-failed').'</p>';
                    
                    case Order::STATUS_FRAUD:
                        return '<p class="label-canceled">'.trans('admin::app.sales.orders.index.datagrid.fraud').'</p>';
                }
            },
        ]);

        $this->addColumn([
            'index'      => 'full_name',
            'label'      => trans('admin::app.sales.orders.index.datagrid.customer'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        /**
         * Searchable dropdown sample. In testing phase.
         */
        $this->addColumn([
            'index'      => 'customer_email',
            'label'      => trans('admin::app.sales.orders.index.datagrid.email'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'           => 'phone',
            'label'           => trans('admin::app.sales.orders.index.datagrid.phone'),
            'type'            => 'string',
            'filterable'      => true,
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'      => 'base_grand_total',
            'label'      => trans('admin::app.sales.orders.index.datagrid.grand-total'),
            'type'       => 'string',
            'exportable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'method',
            'label'      => trans('admin::app.sales.orders.index.datagrid.pay-via'),
            'type'       => 'string',
            'closure'    => function ($row) {
                return core()->getConfigData('sales.payment_methods.'.$row->method.'.title');
            },
        ]);

        $this->addColumn([
            'index'           => 'courier_company',
            'label'           => trans('admin::app.sales.orders.index.datagrid.courier-company'),
            'type'            => 'string',
            'filterable'      => true,
            'sortable'        => true,
        ]);
        
        $this->addColumn([
            'index'           => 'tracking_number',
            'label'           => trans('admin::app.sales.orders.index.datagrid.tracking-number'),
            'type'            => 'string',
            'filterable'      => true,
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'      => 'item_sku',
            'label'      => trans('admin::app.sales.orders.index.datagrid.item-sku'),
            'type'       => 'string',
        ]);

        $this->addColumn([
            'index'      => 'item_name_en',
            'label'      => trans('admin::app.sales.orders.index.datagrid.item-name-en'),
            'type'       => 'string',
        ]);

        $this->addColumn([
            'index'      => 'item_name_cn',
            'label'      => trans('admin::app.sales.orders.index.datagrid.item-name-cn'),
            'type'       => 'string',
        ]);

        $this->addColumn([
            'index'      => 'item_qty',
            'label'      => trans('admin::app.sales.orders.index.datagrid.quantity'),
            'type'       => 'string',
        ]);

       $this->addColumn([
            'index'      => 'color_label',
            'label'      => trans('admin::app.sales.orders.index.datagrid.color'),
            'type'       => 'string',
        ]);

        $this->addColumn([
            'index'      => 'size_label',
            'label'      => trans('admin::app.sales.orders.index.datagrid.size'),
            'type'       => 'string',
        ]);

        $this->addColumn([
            'index'      => 'item_total_price',
            'label'      => trans('admin::app.sales.orders.index.datagrid.item-total-price'),
            'type'       => 'string',
        ]);
  

        $this->addColumn([
            'index'      => 'address',
            'label'      => trans('admin::app.sales.orders.index.datagrid.address'),
            'type'       => 'string',
        ]);

        $this->addColumn([
            'index'      => 'shipping_state',
            'label'      => trans('admin::app.sales.orders.index.datagrid.state'),
            'type'       => 'string',
        ]);

        


        $this->addColumn([
            'index'      => 'items',
            'label'      => trans('admin::app.sales.orders.index.datagrid.items'),
            'type'       => 'string',
            'exportable' => false,
            'closure'    => function ($value) {
                $order = app(OrderRepository::class)->with('items')->find($value->id);
                return view('admin::sales.orders.items', compact('order'))->render();
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (bouncer()->hasPermission('sales.orders.view')) {
            $this->addAction([
                'icon'   => 'icon-view',
                'title'  => trans('admin::app.sales.orders.index.datagrid.view'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.sales.orders.view', $row->id);
                },
            ]);
        }
    }
}
