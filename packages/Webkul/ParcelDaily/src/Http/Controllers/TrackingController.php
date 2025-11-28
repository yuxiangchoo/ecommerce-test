<?php

namespace Webkul\ParcelDaily\Http\Controllers;

use Illuminate\Routing\Controller;
use Webkul\ParcelDaily\Services\ParcelDailyApiService;

class TrackingController extends Controller
{
    public function __construct(protected ParcelDailyApiService $api) {}

    public function show(string $consignNo)
    {
        $tracking = $this->api->trackOrder($consignNo);

        // Render a simple page that looks good in a small window
        return view('parceldaily::shop.tracking.show', [
            'tracking'  => $tracking,
            'consignNo' => $consignNo,
        ]);
    }
}
