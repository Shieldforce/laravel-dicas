<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesList = [
            [
                "name" => "Super Admin",
            ],
            [
                "name" => "Usuário Comum",
            ]
        ];

        foreach ($rolesList as $role) {
            Role::updateOrCreate($role, $role);
        }
    }
}
