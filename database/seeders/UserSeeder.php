<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $user = new User();

        $list = [
            [
                'name'     => "Alexandre Ferreira",
                'email'    => "alexandrefn7@gmail.com",
                'password' => bcrypt("1234"),
            ],
            [
                'name'     => "Beutrano Lalala",
                'email'    => "beutrano@gmail.com",
                'password' => bcrypt("1234"),
            ],
            [
                'name'     => "Cicrano Lalala",
                'email'    => "cicrano@gmail.com",
                'password' => bcrypt("1234"),
            ],
        ];

        foreach ($list as $user) {
            $userNotPass = [
                "name"  => $user["name"],
                "email" => $user["email"],
            ];
            User::updateOrCreate($userNotPass, $user);
        }
    }
}
