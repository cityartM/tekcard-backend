<?php

namespace App\Http\Controllers\Api\Profile;


use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\UpdateProfileDetailsRequest;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepository;

/**
 * @package Dsone\Http\Controllers\Api\Profile
 */
class DetailsController extends ApiController
{
    /**
     * Handle user details request.
     * @return UserResource
     */
    public function index()
    {
        return $this->respondWithSuccess([
            'user' => new UserResource(auth()->user()),
        ],trans('record found'),200);
    }

    /**
     * Updates user profile details.
     * @param UpdateProfileDetailsRequest $request
     * @param UserRepository $users
     * @return UserResource
     */
    public function update(UpdateProfileDetailsRequest $request, UserRepository $users)
    {
        $user = $request->user();

        $data = collect($request->all());

        $data = $data->only([
            'lang','username'
        ])->toArray();

        /*if (! isset($data['city_id'])) {
            $data['city_id'] = $user->city_id;
        }

        if($user->email != $data['email']){
            $data['email_verified_at'] = null;
        }*/

        $user = $users->update($user->id, $data);

        return $this->respondWithSuccess([
            'update' => true,
            'user' => new UserResource($user),
        ], trans('app.attribute_updated',['attribute' => 'user']),200);

    }
}
