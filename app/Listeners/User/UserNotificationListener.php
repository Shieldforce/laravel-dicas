<?php

namespace App\Listeners\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserNotificationListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $request = $event->request;
        $user = $event->user;


        //dd($event->request->validated());
    }
}
