<?php

namespace App\Services;

use App\Models\User;

class HasRoleService
{
    public static function handle(User $user, $name)
    {
        $roles_names = array_values($user->roles->pluck("name")->toArray());
        return in_array($name, $roles_names);
    }
}