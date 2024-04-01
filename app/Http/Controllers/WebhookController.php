<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class WebhookController extends Controller
{
    

    public function newUser(Request $request)
    {
        
        // Retrieve user data from the request
        $userData = "im here 2";

        // Send data to Zapier webhook URL
        $zapierWebhookUrl = 'https://hooks.zapier.com/hooks/catch/18079090/308q5pt/';
        Http::post($zapierWebhookUrl, [
            'user' => $userData,
        ]);

        // You can return a response if needed
        return response()->json(['message' => 'Webhook received successfully']);
    }


}
