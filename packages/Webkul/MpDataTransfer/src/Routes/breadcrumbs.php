<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Seller Data Transfer
Breadcrumbs::for('seller-data-transfer', function (BreadcrumbTrail $trail) {
    $trail->parent('seller_account');

    $trail->push(trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.index.title'));
});

Breadcrumbs::for('seller-data-transfer-import', function (BreadcrumbTrail $trail) {
    $trail->parent('seller-data-transfer');

    $trail->push(trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.datagrid.import'));
});