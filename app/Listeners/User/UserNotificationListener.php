<?php

namespace App\Listeners\User;

use App\Mail\UserStoreMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserNotificationListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        // $request = $event->request;
        $user = $event->user;

        Mail::to($user->email)->send(new UserStoreMail($user));
    }
}
