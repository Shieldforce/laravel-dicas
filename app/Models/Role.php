<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Role extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relations
     */

    public function users()
    {
        return $this->belongsToMany(
            User::class ,
            "users_roles",
            "role_id",
            "user_id",
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class ,
            "roles_permissions",
            "role_id",
            "permission_id",
        );
    }
}
