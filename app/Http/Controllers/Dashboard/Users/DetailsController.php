<?php

namespace App\Http\Controllers\Dashboard\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateDetailsRequest;
use App\Repositories\User\UserRepository;
use App\Support\Enum\UserStatus;
use App\Models\User;
use App\Events\User\Banned;
use App\Events\User\UpdatedByAdmin;


/**
 * Class UserDetailsController
 * @package Hoska\Http\Controllers\Dashboard\Users
 */
class DetailsController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * UsersController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param Company $company
     * @param User $user
     * @param UpdateDetailsRequest $request
     * @return mixed
     */
    public function update(User $user, UpdateDetailsRequest $request)
    {
        $data = $request->all();

        $this->users->update($user->id, $data);
        $this->users->setRole($user->id, $request->role_id);

        //event(new UpdatedByAdmin($user));

        // If user status was updated to "Banned",
        // fire the appropriate event.
        if ($this->userWasBanned($user, $request)) {
            //event(new Banned($user));
        }

        return redirect()->back()
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Check if user is banned during last update.
     *
     * @param User $user
     * @param Request $request
     * @return bool
     */
    private function userWasBanned(User $user, Request $request)
    {
        return $user->status != $request->status
            && $request->status == UserStatus::BANNED;
    }
}
