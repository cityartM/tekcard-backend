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
use Illuminate\Support\Facades\Http;
use Modules\Plan\Models\Plan;
use Modules\Plan\Repositories\UserPlanRepository;
use Modules\Plan\Support\Enum\PlanDuration;

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
    private $userPlans;

    /**
     * Create a new authentication controller instance.
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles,UserAvatarManager $avatarManager,UserPlanRepository $userPlans)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->avatarManager = $avatarManager;
        $this->userPlans = $userPlans;
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

        $plan = Plan::where([
            'type' =>'Client' ,
            'price' => 0
        ])->first();

        $dataPlan = [
            'display_name'=> $plan->getTranslations('display_name'),
            'type' => $plan->type,
            'duration' => $plan->duration,
            'purchase_date' => now()->format('Y-m-d'),
            'expired_date' => $plan->duration == PlanDuration::YEARLY ? now()->addYear()->format('Y-m-d') : now()->addMonth()->format('Y-m-d'),
            'price' => $plan->price,
            'nbr_user' => $plan->nbr_user,
            'nbr_card_user' => $plan->nbr_card_user,
            'has_dashboard' => $plan->has_dashboard,
            'has_video' => $plan->has_video ?? 0,
            'has_pdf' => $plan->has_pdf ?? 0,
            'has_multiple_image' => $plan->has_multiple_image ?? 0,
            'has_water_mark' => $plan->has_water_mark ?? 0,
            'has_share_offline' => $plan->has_share_offline ?? 0,
            'share_with_image' => $plan->share_with_image ?? 0,
            'has_scan_ia' => $plan->has_scan_ia ?? 0,
            'has_group_contact' => $plan->has_group_contact ?? 0,
            'has_scan_location' => $plan->has_scan_location ?? 0,
            'has_note_contact' => $plan->has_note_contact ?? 0,
            'has_statistic' => $plan->has_statistic ?? 0,
            'features' => $plan->features,
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ];


        $this->userPlans->create($dataPlan);

            Auth::setUser($user);

            $this->triggerZapierWebhook($user);

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



    private function triggerZapierWebhook(User $user)
    {
        // Send a POST request to the webhook endpoint with user data
        $zapierWebhookUrl = 'https://hooks.zapier.com/hooks/catch/17045830/30pesh5/';
        Http::post($zapierWebhookUrl, [
            'user' => $user,

        ]);
    }
}
