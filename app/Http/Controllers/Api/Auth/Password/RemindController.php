<?php

namespace App\Http\Controllers\Api\Auth\Password;

use Illuminate\Support\Facades\App;
use Password;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\PasswordRemindRequest;
use App\Mail\ResetPassword;
use App\Repositories\User\UserRepository;

class RemindController extends ApiController
{
    /**
     * Send a reset link to the given user.
     *
     * @param PasswordRemindRequest $request
     * @param UserRepository $users
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(PasswordRemindRequest $request, UserRepository $users)
    {
        $user = $users->findByEmail($request->email);

        App::setlocale($user->lang);

        $token = Password::getRepository()->create($user);

        \Mail::to($user)->send(new ResetPassword($token));


        return $this->respondWithSuccess();
    }
}
