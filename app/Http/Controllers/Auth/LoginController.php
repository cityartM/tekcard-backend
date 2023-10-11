<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LoginController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use ThrottlesLogins;
    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function show()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        // In case that request throttling is enabled, we have to check if user can perform this request.
        // We'll key this by the username and the IP address of the client making these requests into this application.
        $throttles = setting('throttle_enabled');

        //Redirect URL that can be passed as hidden field.
        $to = $request->has('to') ? "?to=" . $request->get('to') : '';

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->getCredentials();
        //dd($credentials);

        if (! \Auth::validate($credentials)) {
            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            if ($throttles) {
              $this->incrementLoginAttempts($request);
            }
            return redirect()->to('login' . $to)->withErrors(trans('auth.failed'));
        }

          $user = \Auth::getProvider()->retrieveByCredentials($credentials);


        \Auth::login($user, setting('remember_me') && $request->get('remember'));

        return $this->authenticated($request, $throttles, $user);
    }


    protected function authenticated(Request $request, $throttles, $user)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if ($request->has('to')) {
            return redirect()->to($request->get('to'));
        }
        return redirect()->intended('/'.LaravelLocalization::getCurrentLocale().'/dashboard');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('login');

    }

}
