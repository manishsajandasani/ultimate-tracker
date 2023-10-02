<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = collect(
            [
                [
                    "id" => "1",
                    "priority_name" => "Eat the Frog",
                    "is_active" => 1
                ],
                [
                    "id" => "2",
                    "priority_name" => "Do",
                    "is_active" => 1
                ],
                [
                    "id" => "3",
                    "priority_name" => "Schedule",
                    "is_active" => 1
                ],
                [
                    "id" => "4",
                    "priority_name" => "Delegate",
                    "is_active" => 1
                ],
                [
                    "id" => "5",
                    "priority_name" => "Eliminate",
                    "is_active" => 1
                ],
            ]
        );

        $priorities->each(function ($priority) {
            Priority::insert($priority);
        });
    }
}
