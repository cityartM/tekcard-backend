<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ReceiptController extends Controller
{
    private $productionUrl = 'https://buy.itunes.apple.com/verifyReceipt';
    private $sandboxUrl = 'https://sandbox.itunes.apple.com/verifyReceipt';



    public function verifyReceipt(Request $request)
    {
        $token = $request->input('token'); 

        // Validate the receipt with the production server first
        $response = $this->sendReceiptForVerification($token, $this->productionUrl);

        // If status is 21007, verify with the sandbox
        if ($response->status == 21007) {
            $response = $this->sendReceiptForVerification($token, $this->sandboxUrl);
        }

        return response()->json($response);
    }

    private function sendReceiptForVerification($token, $url)
    {
        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'receipt-data' => $token,
                // You might also need to include a shared secret if your app uses auto-renewable subscriptions
                // 'password' => 'YOUR_SHARED_SECRET'
            ]
        ]);

        return json_decode($response->getBody(), true);
    }






}
