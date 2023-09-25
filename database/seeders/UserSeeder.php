<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect(
            [
                [
                    "name" => "Manish",
                    "email" => "msajandasani@gmail.com",
                    "password" => Hash::make("man!@#8426"),
                    "role" => 1
                ],
                [
                    "name" => "Guest",
                    "email" => "guest@gmail.com",
                    "password" => Hash::make("guest!@#8426"),
                    "role" => 2
                ]
            ]
        );

        $users->each(function ($user) {
            user::insert($user);
        });
    }
}
