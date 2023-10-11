<?php

namespace Hoska\Http\Controllers\Api\Profile;

use Hoska\Http\Controllers\Api\ApiController;
use Hoska\Http\Resources\SessionResource;
use Hoska\Repositories\Session\SessionRepository;

/**
 * @package Dsone\Http\Controllers\Api\Profile
 */
class SessionsController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('session.database');
    }

    /**
     * Handle user details request.
     * @param SessionRepository $sessions
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SessionRepository $sessions)
    {
        $sessions = $sessions->getUserSessions(auth()->id());

        return SessionResource::collection($sessions);
    }
}
