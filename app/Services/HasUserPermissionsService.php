<?php

namespace App\Services;

use App\Models\User;

class HasUserPermissionsService
{
    public static function getPermissions(User $user)
    {
        $roles = $user->roles()->where(function ($query) {
            $query->with("permissions");
        })->get();

        $permissions = [];

        foreach ($roles as $role) {
            $permissions = $role->permissions->pluck("name")->toArray();
        }
        return array_values($permissions);
    }
}