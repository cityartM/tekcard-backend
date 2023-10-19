<?php

namespace App\Http\Controllers\Api\Auth;


use App\Helpers\Helper;
use App\Http\Requests\Auth\CheckUserRequest;
use App\Http\Resources\UserResource;
use App\Models\TokenDevice;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\ApiLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

/**
 * Class LoginController
 * @package App\Http\Controllers\Api\Auth
 */
class AuthController extends ApiController
{

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->only('login');
        $this->middleware('auth')->only('logout');
    }

    /**
     * @param ApiLoginRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    public function token(ApiLoginRequest $request)
    {
        $user = $this->findUser($request);

        if ($user->isBanned()) {
            return $this->errorUnauthorized(Helper::translate(Helper::checkApiLanguage(), __('Your account is banned by administrators.')));
        }

        Auth::setUser($user);
        return $this->respondWithSuccess([
            'auth' => true,
            'token' => $user->createToken($request->device_token)->plainTextToken,
            'user' => new UserResource($user),
        ], trans('app.user_auth'),200);

    }


    /**
     * Find the user instance from the API request.
     *
     * @param ApiLoginRequest $request
     * @return mixed
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    private function findUser(ApiLoginRequest $request)
    {

        $user = User::where($request->getCredentials())->where('device_id',$request->device_id)->first();

        if (! $user ) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.email')],
            ]);
        }

        if (! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [trans('auth.password')],
            ]);
        }

        return $user;
    }

    /**
     * Logout user and invalidate token.
     * @return JsonResponse
     */
    public function logout(Request $request)
    {

        //auth()->user()->deleteTokenDevice($request->device_id);
        auth()->user()->currentAccessToken()->delete();

        return $this->respondWithSuccess([
            'logout' => true,
        ], trans('app.user_logout'),200);

    }


    /**
     * @param CheckUserRequest $request
     * @return JsonResponse
     */
    public function existUser(CheckUserRequest $request)
    {

        $user = User::where('phone',$request->phone)->first();

        if (! $user)  {
            $uuid = Helper::sendOtp($request->phone,'phone');
            return $this->respondWithSuccess([
                'exist'=> false,
                'uuid'=> $uuid
            ], trans('auth.phone'),200);
        }else{
            if($request->filled('reset') && $request->reset === 'password'){
                $uuid = Helper::sendOtp($request->phone,'phone');
                return $this->respondWithSuccess([
                    'uuid'=> $uuid
                ], trans('OTP sended to your phone'),200);
            }
            return $this->respondWithSuccess(['exist'=> true], trans('auth.phone_exist'),200);
        }

    }



}
