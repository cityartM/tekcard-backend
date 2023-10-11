<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\ApiController;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends ApiController//extends Middleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            return !$request->expectsJson()
                ? redirect()->guest('login')
                : $this->sendFailedResponse('Unauthorized',Response::HTTP_UNAUTHORIZED)
                ;
        }

        return $next($request);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   /* protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }*/
}
