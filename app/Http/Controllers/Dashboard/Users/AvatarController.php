<?php

namespace App\Http\Controllers\Dashboard\Users;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\User\UserRepository;
use App\Services\Upload\UserAvatarManager;
use App\Models\User;

/**
 * Class AvatarController
 * @package Hoska\Http\Controllers\Api\Users
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
        $this->users = $users;
        $this->avatarManager = $avatarManager;
    }

    /**
     * Update user's avatar from uploaded image.
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function update(User $user, Request $request)
    {

        $this->validate($request, ['avatar' => 'image']);
        //dd($request->file('avatar'));
        if(!$request->file('avatar')){
            return redirect()->route('users.edit', $user)
                ->withErrors(__('Avatar image cannot be updated. Please try again.'));
        }else{
            $name = $this->avatarManager->uploadAndCropAvatar(
                $request->file('avatar'),
                ['x1'=> 0, 'x2' => 408, 'y1' => 0, 'y2' => 418]
            );
            if ($name) {
                $this->users->update($user->id, ['avatar' => $name]);

                return redirect()->route('users.edit', $user)
                    ->withSuccess(__('Avatar changed successfully.'));
            }

            return redirect()->route('users.edit', $user)
                ->withErrors(__('Avatar image cannot be updated. Please try again.'));
        }

    }

    /**
     * Update user's avatar from some external source (Gravatar, Facebook, Twitter...)
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     */
    public function updateExternal(User $user, Request $request)
    {
        $this->avatarManager->deleteAvatarIfUploaded($user);

        $this->users->update($user->id, ['avatar' => $request->get('url')]);


        return redirect()->route('users.edit', $user)
            ->withSuccess(__('Avatar changed successfully.'));
    }
}
