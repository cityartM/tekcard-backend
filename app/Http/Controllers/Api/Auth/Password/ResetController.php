<?php

namespace App\Http\Controllers\Api\Auth\Password;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Password;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\PasswordResetRequest;

class ResetController extends ApiController
{
    /**
     * Reset the given user's password. 
     *
     * @param PasswordResetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(PasswordResetRequest $request)
    {

            $user = User::where('email',$request->email)->first();
            $token = app(PasswordBroker::class)->createToken($user);
            $request->merge(['token' => $token]);
            $response = Password::reset($request->credentialsApi(), function ($user, $password) {
                $this->resetPassword($user, $password);
            });



        switch ($response) {
            case Password::PASSWORD_RESET:
                return $this->respondWithSuccess([
                    'reset' => true,
                ], 'Your password reset successfully',200);

            default:
                return $this->setStatusCode(400)
                    ->respondWithError(trans($response));
        }
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = $password;
        $user->save();
    }
}
