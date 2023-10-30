<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\ApiRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Services\Upload\UserAvatarManager;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Role\RoleRepository;

class RegistrationController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var RoleRepository
     */
    private $roles;
    private $avatarManager;

    /**
     * Create a new authentication controller instance.
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles,UserAvatarManager $avatarManager)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->avatarManager = $avatarManager;
    }

    /**
     * @param ApiRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ApiRegisterRequest $request)
    {

        $role = $this->roles->findByName('User');

            $avatarName = null;

            if($request->hasFile('file')){
                $avatarName = $this->avatarManager->uploadAndCropAvatar(
                    $request->file('file'),
                );
            }

            $user = $this->users->create(
                array_merge($request->validFormData(), [
                    'role_id' => $role->id,
                    'username' => $request->username,
                    'email' => $request->email,
                    'status'=>UserStatus::UNCONFIRMED,
                    'avatar' => $avatarName,
                    'device_token' => $request->device_token,
                    'device_id' => $request->device_id,
                    'device_name' => $request->device_name,
                    'brand' => $request->brand,
                    'app_version' => $request->app_version,
                    'os' => $request->os,
                    'currency_id' => $request->currency_id,
                    'free_days' => (int) setting('free_days'),
                    'timezone' => $request->timezone,
                    'email_verified_at' => Carbon::now()->format('Y-m-d'),
                ])
            );

            Auth::setUser($user);

            return $this->respondWithSuccess([
                'registration' => true,
                'token' => $user->createToken($request->device_token)->plainTextToken,
                'user' => new UserResource($user),
            ], trans('app.attribute_created',['attribute' => 'user']),200);

    }

    /**
     * Verify email via email confirmation token.
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyEmail($token)
    {
        if (! setting('reg_email_confirmation')) {
            return $this->errorNotFound();
        }

        if ($user = $this->users->findByConfirmationToken($token)) {
            $this->users->update($user->id, [
                'status' => UserStatus::ACTIVE,
                'confirmation_token' => null
            ]);

            return $this->respondWithSuccess();
        }

        return $this->setStatusCode(400)
            ->respondWithError("Invalid confirmation token.");
    }

    public function checkOtp(Request $request)
    {
        $result = Helper::isOtpValid($request->uuid,$request->otp);
        return $this->respondWithSuccess([
            'otp' => $result,
        ], null,200);
    }

    /**
     * Removes the user from database.
     *
     * @param User $user
     * @return $this
     */
    public function destroy(Request $request)
    {
        $this->users->delete(auth()->user()->id);

        return $this->respondWithSuccess([
            'result' => [],
        ], 'User deleted successfully',200);

    }
}
