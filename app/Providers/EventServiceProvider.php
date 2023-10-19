<?php

namespace App\Providers;

use App\Events\User\Banned;
use App\Events\User\LoggedIn;
use App\Listeners\Login\UpdateLastLoginTimestamp;
use App\Listeners\Registration\SendSignUpNotification;
use App\Listeners\Users\ActivateUser;
use App\Listeners\Users\InvalidateSessions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendSignUpNotification::class,
        ],

        LoggedIn::class => [
            UpdateLastLoginTimestamp::class
        ],
        Banned::class => [
            InvalidateSessions::class
        ],
        Verified::class => [
            ActivateUser::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
