<?php

namespace Webkul\Paydibs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Transformers\OrderResource;
use Webkul\Sales\Models\Order;

class PaymentController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function redirect()
    {
        $cart = Cart::getCart();
        $data = (new OrderResource($cart))->jsonSerialize();
        $order = $this->orderRepository->create($data);
        Cart::deActivateCart();

        session()->flash('order_id', $order->id);

        $merchantID = core()->getConfigData('sales.payment_methods.paydibs.merchant_id');
        $secretKey  = core()->getConfigData('sales.payment_methods.paydibs.secret_key');
        $endpoint   = core()->getConfigData('sales.payment_methods.paydibs.endpoint');

        $merchantPymtID = $order->id . '_' . time();
        $amount         = number_format($order->grand_total, 2, '.', '');
        $redirectUrl    = route('paydibs.handle-redirect');
        $callbackUrl    = route('paydibs.handle-callback');
        $currency       = 'MYR'; //core()->getCurrentCurrencyCode();

        $payload = [
            'TxnType'             => 'PAY',
            'MerchantID'          => $merchantID,
            'MerchantPymtID'      => $merchantPymtID,
            'MerchantOrdID'       => $merchantPymtID,
            'MerchantOrdDesc'     => 'Order #' . $order->increment_id,
            'MerchantTxnAmt'      => number_format($amount, 2, '.', ''),
            'MerchantCurrCode'    => $currency,
            'MerchantRURL'        => str_replace('&', ';', $redirectUrl),
            'CustIP'              => request()->ip(),
            'CustName'            => $order->customer_first_name . ' ' . $order->customer_last_name,
            'CustEmail'           => $order->customer_email,
            'CustPhone'           => $order->billing_address->phone,
            'MerchantCallbackURL' => str_replace('&', ';', $callbackUrl),
        ];

        $payload['Sign'] = $this->generateSignature($payload, $secretKey);

        return view('paydibs::redirect-form', ['data' => $payload, 'endpoint' => $endpoint]);
    }

    public function handleRedirect(Request $request)
    {
        $data = $request->all();
        \Log::info('Paydibs Redirect Request Received', $data);

        if (!$this->verifySignature($data)) {
            \Log::warning('Paydibs Redirect - Invalid Signature', $data);
            return redirect()->route('shop.checkout.cart.index')->with('error', 'Invalid Signature');
        }

        $order = $this->getOrder($data['MerchantPymtID']);
        \Log::info('Paydibs Redirect - Order Retrieved', ['order_id' => $order->id]);


        // Prepare data for QUERY request
        $merchantID = core()->getConfigData('sales.payment_methods.paydibs.merchant_id');
        $secretKey  = core()->getConfigData('sales.payment_methods.paydibs.secret_key');
        $endpoint   = core()->getConfigData('sales.payment_methods.paydibs.endpoint'); // Make sure this is set in admin

        $queryData = [
            'TxnType'           => 'QUERY',
            'MerchantID'        => $merchantID,
            'MerchantPymtID'    => $data['MerchantPymtID'],
            'MerchantTxnAmt'    => number_format($order->grand_total, 2, '.', ''),
            'MerchantCurrCode'  => core()->getCurrentCurrencyCode(),
        ];

        $queryData['Sign'] = $this->generateQuerySignature($queryData, $secretKey);
        \Log::info('Paydibs QUERY Payload', $queryData);

        $response = $this->callPaydibsQueryApi($queryData, $endpoint);
        \Log::info('Paydibs QUERY Response', ['response' => $response]);
         
        if ($data['PTxnStatus'] === '0') {
            //$this->orderRepository->toProcess($order);
            $this->orderRepository->updateOrderStatus($order, Order::STATUS_TO_PROCESS);
            \Log::info('Paydibs Redirect - Order marked as processing', ['order_id' => $order->id]);
            return redirect()->route('shop.checkout.onepage.success');
        } 

        if ($data['PTxnStatus'] === '1' || $data['PTxnStatus'] === '17') {
            $this->orderRepository->cancelPayment($order);
            \Log::info('Paydibs Redirect - Order canceled', ['order_id' => $order->id]);
            return redirect()->route('shop.checkout.cart.index');
        }
        \Log::error('Paydibs Redirect - Unknown Payment Status', ['data' => $data]);
        return redirect()->route('shop.checkout.cart.index')->with('error', $data['PTxnMsg'] ?? 'Payment Failed');
    }

    public function handleCallback(Request $request)
    {
        $rawContent = $request->getContent();
        \Log::info('Paydibs Callback Raw Content', ['raw' => $rawContent]);
        $decoded = urldecode($rawContent);
        $data = json_decode($decoded, true);

        if (!$this->verifySignature($data)) {
            \Log::warning('Paydibs Callback - Invalid Signature', $data);
            return response('Invalid Signature', 400);
        }

        $order = $this->getOrder($data['MerchantPymtID']);

        if ($data['PTxnStatus'] === '0') {
            $this->orderRepository->updateOrderStatus($order);
        } else {
            $this->orderRepository->cancelPayment($order);
        }

        $order->save();
         \Log::info('Paydibs Callback - Order Updated', [
            'order_id' => $order->id,
            'status'   => $order->status,
            'data'     => $data
        ]);
        return response('OK', 200);
    }


    protected function generateSignature(array $data, string $secretKey)
    {
        $stringToSign = $data['TxnType']
                . $data['MerchantID']
                . $data['MerchantPymtID']
                . $data['MerchantOrdID']
                . $data['MerchantRURL']
                . $data['MerchantTxnAmt']
                . $data['MerchantCurrCode']
                . $data['CustIP']
                . $data['MerchantCallbackURL'];

        return hash('sha512', $secretKey.$stringToSign);
    }

    private function generateQuerySignature(array $data, string $secretKey): string
    {
        // The exact order of fields to be signed must match Paydibs docs
        $stringToSign = 
                        $data['MerchantID'] .                      
                        $data['MerchantPymtID'] .
                        $data['MerchantTxnAmt'] .
                        $data['MerchantCurrCode'];
        return hash('sha512', $secretKey.$stringToSign);
    }

    protected function verifySignature(array $data)
    {
        $expected = $data['Sign'];
        unset($data['Sign']);
        $string = 
                 $data['MerchantID']
                .$data['MerchantPymtID']
                .$data['PTxnID']
                .$data['MerchantOrdID']
                .$data['MerchantTxnAmt']
                .$data['MerchantCurrCode']
                .$data['PTxnStatus']
                .$data['AuthCode'];
        $secretKey = core()->getConfigData('sales.payment_methods.paydibs.secret_key'); 
        $status =  strtolower(hash('sha512', $secretKey.$string)) === strtolower($expected);
        return $status;
    }

    protected function getOrder($merchantPymtID)
    {
        // Extract order ID from MerchantPymtID (e.g., "123_1723887629")
        $orderId = explode('_', $merchantPymtID)[0];

        return $this->orderRepository->find($orderId);
    }

    private function callPaydibsQueryApi(array $payload, string $endpoint)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post($endpoint, [
                'form_params' => $payload,
                'headers'     => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'verify' => true // Ensure TLS 1.2 support
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            \Log::error('Paydibs QUERY API Failed: ' . $e->getMessage());
            return null;
        }
    }
}