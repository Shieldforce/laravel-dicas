<?php

namespace Database\Seeders;

use App\Services\SetupPermissionsService;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SetupPermissionsService::handle();
    }
}
