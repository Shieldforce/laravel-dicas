<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class SetupPermissionsService
{
    public static function handle()
    {
        $listRoutesSanctum = self::list();

        Permission::whereNotIn("name", array_values($listRoutesSanctum))->delete();

        foreach ($listRoutesSanctum as $routeSanctumName) {
            Permission::updateOrCreate([
                "name" => $routeSanctumName,
                "description" => "Permissão ({$routeSanctumName})"
            ], [
                "name" => $routeSanctumName,
                "description" => "Permissão ({$routeSanctumName})"
            ]);
        }

        self::rolesSyncPermissions();
    }

    public static function list()
    {
        $routesAll = Route::getRoutes()->getRoutes();
        $routesSanctum = [];
        foreach ($routesAll as $routeItem) {
            if(in_array("auth:sanctum", $routeItem->middleware())) {
                $routesSanctum[] = $routeItem->getName();
            }
        }
        return $routesSanctum;
    }

    private static function rolesSyncPermissions()
    {
        $sa = Role::where("name", "Super Admin")->first();
        if(isset($sa)) {
            $sa->permissions()->sync(Permission::pluck("id"));
        }

        $user = Role::where("name", "Usuário Comum")->first();
        if(isset($user)) {
            $user->permissions()->sync(Permission::where("name", [
                "user.index"
            ])->pluck("id"));
        }
    }
}