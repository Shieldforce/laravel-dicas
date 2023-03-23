<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Permission extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relations
     */

    public function roles()
    {
        return $this->belongsToMany(
            Role::class ,
            "roles_permissions",
            "permission_id",
            "role_id",
        );
    }
}
