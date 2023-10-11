<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateLoginDetailsRequest;
use App\Repositories\User\UserRepository;
use App\Models\User;

/**
 * Class UserDetailsController
 * @package Hoska\Http\Controllers\Dashboard\Users
 */
class LoginDetailsController extends Controller
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
     * Update user's login details.
     *
     * @param User $user
     * @param UpdateLoginDetailsRequest $request
     * @return mixed
     */
    public function update(User $user, UpdateLoginDetailsRequest $request)
    {
        $data = $request->all();

        if (! $data['password']) {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        $this->users->update($user->id, $data);

        return redirect()->route('users.edit', $user->id)
            ->withSuccess(__('Login details updated successfully.'));
    }
}
