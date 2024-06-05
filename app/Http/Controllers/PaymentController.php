<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class PaymentController extends Controller
{
    private $client;

    public function __construct()
    {
        $clientId = Config::get('paypal.client_id');
        $clientSecret = Config::get('paypal.client_secret');

        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $this->client = new PayPalHttpClient($environment);
    }

    public function payWithPayPal()
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "value" => "3.99",
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => url('/paypal/status?success=false'),
                "return_url" => url('/paypal/status?success=true')
            ]
        ];

        try {
            $response = $this->client->execute($request);
            foreach ($response->result->links as $link) {
                if ($link->rel == 'approve') {
                    return redirect()->away($link->href);
                }
            }
        } catch (\PayPalHttp\HttpException $ex) {
            // Log the error or manage exceptions
            return redirect('/error')->with('error', $ex->getMessage());
        }

        return redirect('/error')->with('error', 'Unable to complete the payment.');
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->query('paymentId');
        $token = $request->query('token');
        $success = $request->query('success');

        if ($success === 'true') {
            // Payment was successful
            return redirect('/results')->with('status', 'Thanks! Your payment was successful.');
        }

        return redirect('/results')->with('status', 'Sorry! There was an error processing your payment.');
    }
}