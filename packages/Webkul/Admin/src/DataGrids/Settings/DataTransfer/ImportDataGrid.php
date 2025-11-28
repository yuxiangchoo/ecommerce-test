<?php

namespace Webkul\Admin\DataGrids\Settings\DataTransfer;

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
    ) {}

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('imports')
            ->leftJoin('seller_imports', 'seller_imports.import_id', '=', 'imports.id')
            ->leftJoin('marketplace_sellers', 'marketplace_sellers.id', '=', 'seller_imports.seller_id')
            ->select(
                'imports.id',
                'imports.state',
                'imports.type',
                'marketplace_sellers.name as seller_name',
                'imports.file_path',
                'imports.error_file_path',
                'imports.started_at',
                'imports.completed_at',
                'imports.summary',
            );

        $this->addFilter('id', 'imports.id');
        $this->addFilter('state', 'imports.state');
        $this->addFilter('seller_name', DB::raw("COALESCE(marketplace_sellers.name, 'admin')"));

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
            'index'      => 'id',
            'label'      => trans('admin::app.settings.data-transfer.imports.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        if (core()->getConfigData('marketplace.settings.general.status')) {
            $this->addColumn([
                'index'      => 'seller_name',
                'label'      => trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.seller'),
                'type'       => 'string',
                'searchable' => false,
                'filterable' => true,
                'sortable'   => true,
                'closure'    => function ($row) {
                    return $row->seller_name ?? 'Admin';
                }
            ]);
        }

        $this->addColumn([
            'index'      => 'state',
            'label'      => trans('admin::app.settings.data-transfer.imports.index.datagrid.state'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'file_path',
            'label'      => trans('admin::app.settings.data-transfer.imports.index.datagrid.uploaded-file'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                return '<a href="' . route('admin.settings.data_transfer.imports.download', $row->id) . '" class="cursor-pointer text-blue-600 hover:underline">' . $row->file_path . '<a>';
            },
        ]);

        $this->addColumn([
            'index'      => 'error_file_path',
            'label'      => trans('admin::app.settings.data-transfer.imports.index.datagrid.error-file'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                if (empty($row->error_file_path)) {
                    return '';
                }

                return '<a href="' . route('admin.settings.data_transfer.imports.download_error_report', $row->id) . '" class="cursor-pointer text-blue-600 hover:underline">' . $row->error_file_path . '<a>';
            },
        ]);

        $this->addColumn([
            'index'           => 'started_at',
            'label'           => trans('admin::app.settings.data-transfer.imports.index.datagrid.started-at'),
            'type'            => 'date',
            'searchable'      => false,
            'filterable'      => true,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'           => 'completed_at',
            'label'           => trans('admin::app.settings.data-transfer.imports.index.datagrid.completed-at'),
            'type'            => 'date',
            'searchable'      => false,
            'filterable'      => true,
            'filterable_type' => 'date_range',
            'sortable'        => true,
        ]);

        $this->addColumn([
            'index'      => 'summary',
            'label'      => trans('admin::app.settings.data-transfer.imports.index.datagrid.summary'),
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
                    $stats[] = trans('admin::app.settings.data-transfer.imports.index.datagrid.' . $type) . ': ' . $summary[$type];
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
        if (bouncer()->hasPermission('settings.data_transfer.imports.import')) {
            $this->addAction([
                'index'  => 'import',
                'icon'   => 'icon-import',
                'title'  => trans('admin::app.settings.data-transfer.imports.index.datagrid.import'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.settings.data_transfer.imports.import', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('settings.data_transfer.imports.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.settings.data-transfer.imports.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.settings.data_transfer.imports.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('settings.data_transfer.imports.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.settings.data-transfer.imports.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.settings.data_transfer.imports.delete', $row->id);
                },
            ]);
        }
    }
}