<?php

namespace App\Providers;

use App\Events\User\UserStoreEvent;
use App\Listeners\User\UserNotificationListener;
use App\Listeners\User\UserRolesSyncListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserStoreEvent::class => [
            UserNotificationListener::class,
            UserRolesSyncListener::class,
        ]
    ];

    public function boot(): void
    {
        //
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
