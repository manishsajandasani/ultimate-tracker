<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $statuses = collect(
            [
                [
                    "id" => "1",
                    "status_name" => "Pending",
                    "is_active" => 1
                ],
                [
                    "id" => "2",
                    "status_name" => "In Process",
                    "is_active" => 1
                ],
                [
                    "id" => "3",
                    "status_name" => "Completed",
                    "is_active" => 1
                ],
                [
                    "id" => "4",
                    "status_name" => "Cancelled",
                    "is_active" => 1
                ],
            ]
        );

        $statuses->each(function ($status) {
            Status::insert($status);
        });
    }
}
