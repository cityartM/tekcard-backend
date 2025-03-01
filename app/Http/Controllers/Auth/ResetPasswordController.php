<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param Request $request
     * @param string|null $token
     * @return Factory|View
     */
    public function showResetForm(Request $request, string $token = null)
    {
       // dd($request->query('email'));
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->get('email')]
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function reset(Request $request): RedirectResponse
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response === Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages(): array
    {
        return [];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param CanResetPassword $user
     * @param string $password
     * @return void
     */
    protected function resetPassword(CanResetPassword $user, string $password)
    {

        $user->password = $password;

        $user->setRememberToken(Str::random(60));

        $user->save();

        $this->guard()->login($user);
    }


    /**
     * Get the response for a successful password reset.
     *
     * @param Request $request
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetResponse(Request $request, string $response): RedirectResponse
    {
        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param Request $request
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetFailedResponse(Request $request, string $response): RedirectResponse
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    public function broker(): PasswordBroker
    {
        return Password::broker();
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return auth()->guard();
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath(): string
    {
        return $this->redirectTo;
    }

}
