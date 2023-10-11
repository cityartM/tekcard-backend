<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Request;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\Social\ApiAuthenticateRequest;
use App\Http\Resources\UserResource;
use App\Models\Social;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Services\Auth\Social\SocialManager;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\UnencryptedToken;

class SocialLoginController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var SocialManager
     */
    private $socialManager;

    private $auth;

    private $roles;


    /**
     * @param UserRepository $users
     * @param SocialManager $socialManager
     */
    public function __construct(UserRepository $users, SocialManager $socialManager,Auth $auth, RoleRepository $roles)
    {
        $this->users = $users;
        $this->socialManager = $socialManager;
        $this->auth = $auth;
        $this->roles = $roles;
    }

   /* public function index(ApiAuthenticateRequest $request)
    {
        try {
            $socialUser = Socialite::driver($request->network)->userFromToken($request->social_token);
        } catch (Exception $e) {
            return $this->errorInternalError("Could not connect to specified social network.");
        }

        $user = $this->users->findBySocialId(
            $request->network,
            $socialUser->getId()
        );

        if (! $user) {
            if (! setting('reg_enabled')) {
                return $this->errorForbidden("Only users who already created an account can log in.");
            }

            $user = $this->socialManager->associate($socialUser, $request->network);
        }

        if ($user->isBanned()) {
            return $this->errorForbidden(__("Your account is banned by administrators."));
        }

        Auth::setUser($user);

        event(new LoggedIn);

        return $this->respondWithArray([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }*/

    public function authenticateWithSocialMedia(Request $request) {

        $data = $request->only('id_token');

        $parser = new Parser(new JoseEncoder());
        $token = $parser->parse($data['id_token']);

        try {
            $this->auth->verifyIdToken($token);
        } catch (FailedToVerifyToken $e) {
            return $this->respondWithError("Invalid ID token.");
        }

        assert($token instanceof UnencryptedToken);
        $response = $token->claims()->all();
        $user = $this->auth->getUser($response['user_id']);

       /* return $this->respondWithSuccess([
            'user' => $user->providerData[0]->email,
        ], trans('app.attribute_created',['attribute' => 'user']),200);
*/
        $providerId = $user->providerData[0]->uid;
        $providerName = str_replace('.com', '', $user->providerData[0]->providerId);;
        $email = $user->providerData[0]->email;
        $name = $user->providerData[0]->displayName;
        $photoUrl = $user->providerData[0]->photoUrl;

        $socialLogin = Social::where('provider_id', $providerId)->first();

        if (!$socialLogin) {
            $role = $this->roles->findByName('User');
            $user = $this->users->create(
                 [
                     'role_id' => $role->id,
                     'username' => $name ?? "gratuito".$providerId,
                     'email' => $email != null ? $email : $providerId . '@' . $providerName . '.com',
                     'password' => bcrypt($providerId),
                     'status'=>UserStatus::ACTIVE,
                     'avatar' => $photoUrl,
                     'device_token' => $request->device_token,
                     'device_id' => $request->device_id,
                     'device_name' => $request->device_name,
                     'brand' => $request->brand,
                     'app_version' => $request->app_version,
                     'os' => $request->os,
                     'currency_id' => $request->currency_id,
                     'free_days' => (int) setting('free_days'),
                     'timezone' => $request->timezone,
                     'lang' => $request->lang,
                     'socialite' => $providerName,
                     'email_verified_at' => Carbon::now()->format('Y-m-d'),
                ]
            );

            // Also, add an entry in the social_logins table
            Social::create([
                'user_id' => $user->id,
                'provider' => $providerName,
                'provider_id' => $providerId,
                'avatar' => $photoUrl,
                'created_at' => now()
            ]);
        }else {
            $user = $socialLogin->user;
        }

        \Illuminate\Support\Facades\Auth::setUser($user);

        return $this->respondWithSuccess([
            'registration' => true,
            'token' => $user->createToken($request->device_token)->plainTextToken,
            'user' => new UserResource($user),
        ], trans('app.attribute_created',['attribute' => 'user']),200);
    }
}
