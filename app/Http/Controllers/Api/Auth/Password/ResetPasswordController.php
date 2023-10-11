<?php

namespace App\Http\Controllers\Api\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//added classes
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;

class ResetPasswordController extends ApiController
{
    
    public function checkEmailAndSendLink(Request $request)
    {
        // Validate the email
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Email does not exist.'], 404);
        }

       // return response()->json(['message' => 'email recieved'], 200);

        // If email exists, trigger password reset link
        $response = Password::sendResetLink(
            $request->only('email')
        );

       

        if ($response === Password::RESET_LINK_SENT) {
            return $this->respondWithSuccess(['message' => 'Reset link sent.'], 200);
        } else {
            return $this->respondWithSuccess(['message' => 'Failed to send reset link.'], 500);
        }
    }



}
