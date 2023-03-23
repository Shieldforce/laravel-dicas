<?php

namespace App\Listeners\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserRolesSyncListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $request = $event->request;
        $user = $event->user;

        $user->roles()->sync($request->roles_ids);
    }
}
