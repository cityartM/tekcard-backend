<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\UpdateProfileLoginDetailsRequest;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * @package Dsone\Http\Controllers\Api\Profile
 */
class AuthDetailsController extends ApiController
{
    /**
     * Updates user profile details.
     *
     * @param UpdateProfileLoginDetailsRequest $request
     * @param UserRepository $users
     * @return array
     */
    public function update(UpdateProfileLoginDetailsRequest $request, UserRepository $users)
    {
        $user = $request->user();

        if (! $user || ! Hash::check($request->old_password, $user->password)) {
            return $this->sendFailedResponse(trans('auth.failed'),422);
        }

        $data = $request->only(['old_password', 'password']);

        $user = $users->update($user->id, $data);
        return $this->respondWithSuccess([
            'update' => true,
            'user' => new UserResource($user),
        ], trans('Password updated successfully'),200);

    }
}
