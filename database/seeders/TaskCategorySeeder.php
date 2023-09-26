<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskCategory;

class TaskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taskCategories = collect(
            [
                [
                    "id" => 1,
                    "user_id" => 1,
                    "task_category_name" => "SISTec",
                    "is_active" => 1
                ],
                [
                    "id" => 2,
                    "user_id" => 1,
                    "task_category_name" => "SISTec-GN",
                    "is_active" => 1
                ],
                [
                    "id" => 3,
                    "user_id" => 1,
                    "task_category_name" => "SISTec-R",
                    "is_active" => 1
                ],
                [
                    "id" => 4,
                    "user_id" => 1,
                    "task_category_name" => "SISTec-E",
                    "is_active" => 1
                ],
                [
                    "id" => 5,
                    "user_id" => 1,
                    "task_category_name" => "SISTec-MBA",
                    "is_active" => 1
                ],
                [
                    "id" => 6,
                    "user_id" => 1,
                    "task_category_name" => "SIPTec",
                    "is_active" => 1
                ],
                [
                    "id" => 7,
                    "user_id" => 1,
                    "task_category_name" => "SPS-Bhopal",
                    "is_active" => 1
                ],
                [
                    "id" => 8,
                    "user_id" => 1,
                    "task_category_name" => "SPS-SN",
                    "is_active" => 1
                ],
                [
                    "id" => 9,
                    "user_id" => 1,
                    "task_category_name" => "SPS-GN",
                    "is_active" => 1
                ],
                [
                    "id" => 10,
                    "user_id" => 1,
                    "task_category_name" => "SPS-RN",
                    "is_active" => 1
                ],
                [
                    "id" => 11,
                    "user_id" => 1,
                    "task_category_name" => "SPS-RB",
                    "is_active" => 1
                ],
                [
                    "id" => 12,
                    "user_id" => 1,
                    "task_category_name" => "SPS-KE",
                    "is_active" => 1
                ],
                [
                    "id" => 13,
                    "user_id" => 1,
                    "task_category_name" => "SPS-DD",
                    "is_active" => 1
                ],
                [
                    "id" => 14,
                    "user_id" => 1,
                    "task_category_name" => "Sagar Manufacturers Pvt. Ltd.",
                    "is_active" => 1
                ],
                [
                    "id" => 15,
                    "user_id" => 1,
                    "task_category_name" => "Sagar Nutriments Pvt. Ltd.",
                    "is_active" => 1
                ],
                [
                    "id" => 16,
                    "user_id" => 1,
                    "task_category_name" => "The Sagar",
                    "is_active" => 1
                ],
                [
                    "id" => 17,
                    "user_id" => 1,
                    "task_category_name" => "Sagar Multispeciality Hospital",
                    "is_active" => 1
                ],
                [
                    "id" => 18,
                    "user_id" => 1,
                    "task_category_name" => "Accounts ERP",
                    "is_active" => 1
                ],
                [
                    "id" => 19,
                    "user_id" => 1,
                    "task_category_name" => "Admissions ERP",
                    "is_active" => 1
                ],
                [
                    "id" => 20,
                    "user_id" => 1,
                    "task_category_name" => "Lead Management System",
                    "is_active" => 1
                ]
            ]
        );

        $taskCategories->each(function ($taskCategory) {
            TaskCategory::insert($taskCategory);
        });
    }
}