<?php

namespace App\Http\Controllers\Api\Users;

use Illuminate\Http\Request;
// use App\Events\User\UpdatedByAdmin;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\UploadAvatarRawRequest;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepository;
use App\Services\Upload\UserAvatarManager;
use App\Models\User;

/**
 * @package Dsone\Http\Controllers\Api\Users
 */
class AvatarController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var UserAvatarManager
     */
    private $avatarManager;

    public function __construct(UserRepository $users, UserAvatarManager $avatarManager)
    {
        $this->middleware('permission:users.manage');

        $this->users = $users;
        $this->avatarManager = $avatarManager;
    }

    /**
     * @param User $user
     * @param UploadAvatarRawRequest $request
     * @return UserResource
     */
    public function update(User $user, UploadAvatarRawRequest $request)
    {
        $name = $this->avatarManager->uploadAndCropAvatar($request->file('file'));

        $user = $this->users->update($user->id, ['avatar' => $name]);

        // event(new UpdatedByAdmin($user));

        return new UserResource($user);
    }

    /**
     * Update user's avatar to external resource.
     *
     * @param User $user
     * @param Request $request
     * @return UserResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateExternal(User $user, Request $request)
    {
        $this->validate($request, ['url' => 'required|url']);

        $this->avatarManager->deleteAvatarIfUploaded($user);

        $user = $this->users->update($user->id, ['avatar' => $request->url]);

        // event(new UpdatedByAdmin($user));

        return new UserResource($user);
    }

    /**
     * Remove user's avatar and set it to null.
     *
     * @param User $user
     * @return UserResource
     */
    public function destroy(User $user)
    {
        $this->avatarManager->deleteAvatarIfUploaded($user);

        $user = $this->users->update($user->id, ['avatar' => null]);

        // event(new UpdatedByAdmin($user));

        return new UserResource($user);
    }
}
