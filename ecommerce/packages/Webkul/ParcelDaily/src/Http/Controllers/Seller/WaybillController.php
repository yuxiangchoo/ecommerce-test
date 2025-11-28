<?php

namespace Webkul\ParcelDaily\Http\Controllers\Seller;

use Illuminate\Routing\Controller;
use Webkul\ParcelDaily\Models\OrderShipment;
use Webkul\ParcelDaily\Services\ParcelDailyApiService;

class WaybillController extends Controller
{
    public function __construct(protected ParcelDailyApiService $api) {}

    public function download(int $id)
    {
        $shipment = OrderShipment::findOrFail($id);

        if (!$shipment->connote) {
            return back()->withErrors(['general' => trans('parceldaily::app.no-connote')]);
        }

        try {
            $response = $this->api->downloadConsignPdf($shipment->connote);
        } catch (\Throwable $e) {
            $errorMessage = $e->getMessage();
            return back()->withErrors(['general' => 'Waybill download failed: '.$errorMessage]);
        }

        if ($response['type'] === 'redirect') {
            return redirect()->away($response['url']);
        }

        return response($response['content'], 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.$response['filename'].'"');
    }
}
