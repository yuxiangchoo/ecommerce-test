<?php

namespace Webkul\MpDataTransfer\Datagrids\Shop;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Marketplace\Repositories\SellerRepository;

class ImportDataGrid extends DataGrid
{
    /**
     * Create a new repository instance.
     *
     * @param  Webkul\Marketplace\Repositories\SellerRepository $sellerRepository
     * @return void
     */
    public function __construct(
        protected SellerRepository $sellerRepository,
    ) {
    }

    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder()
    {        
        $seller = $this->sellerRepository->findOneByField('id', auth()->guard('seller')->user()->id);

        $queryBuilder = DB::table('imports as imp')
            ->addSelect(
                'imp.id',
                'imp.state',
                'imp.file_path',
                'imp.error_file_path',
                'imp.started_at',
                'imp.completed_at',
                'imp.summary',
            )
            ->leftJoin('seller_imports as si', 'imp.id', '=', 'si.import_id')
            ->where('si.seller_id', $seller->id);
            
        $this->addFilter('id', 'imp.id');
        $this->addFilter('state', 'imp.state');

        return $queryBuilder;
    }

    /**
     * Add columns.
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'state',
            'label'      => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.state'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'file_path',
            'label'      => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.uploaded-file'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                return '<a href="'.route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download', $row->id).'" class="cursor-pointer text-blue-600 hover:underline">'.$row->file_path.'<a>';
            },
        ]);

        $this->addColumn([
            'index'      => 'error_file_path',
            'label'      => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.error-file'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                if (empty($row->error_file_path)) {
                    return '';
                }

                return '<a href="'.route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download_error_report', $row->id).'" class="cursor-pointer text-blue-600 hover:underline">'.$row->error_file_path.'<a>';
            },
        ]);

        $this->addColumn([
            'index'           => 'started_at',
            'label'           => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.started-at'),
            'type'            => 'date',
            'searchable'      => false,
            'filterable'      => true,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'           => 'completed_at',
            'label'           => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.completed-at'),
            'type'            => 'date',
            'searchable'      => false,
            'filterable'      => true,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'      => 'summary',
            'label'      => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.summary'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                if (empty($row->summary)) {
                    return '';
                }

                $summary = json_decode($row->summary, true);

                $stats = [];

                foreach ($summary as $type => $value) {
                    $stats[] = trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.'.$type).': '.$summary[$type];
                }

                return implode(', ', $stats);
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
        $this->addAction([
            'index'  => 'import',
            'icon'   => 'mp-dt-icon-import',
            'title'  => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.import'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.import', $row->id);
            },
        ]);
        
        $this->addAction([
            'index'  => 'edit',
            'icon'   => 'mp-dt-icon-edit',
            'title'  => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.edit'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.edit', $row->id);
            },
        ]);
     
        $this->addAction([
            'index'  => 'delete',
            'method' => 'DELETE',
            'url'    => function ($row) {
                return route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.delete', $row->id);
            },
            'icon'   => 'mp-delete-icon',
            'title'  => trans('marketplace::app.shop.sellers.account.products.index.datagrid.delete'),
        ]);
    }
}
