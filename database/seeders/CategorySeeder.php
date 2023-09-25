<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(
            [
                [
                    "id" => 1,
                    "cat_name" => "SISTec",
                    "is_active" => 1
                ],
                [
                    "id" => 2,
                    "cat_name" => "SISTec-GN",
                    "is_active" => 1
                ],
                [
                    "id" => 3,
                    "cat_name" => "SISTec-R",
                    "is_active" => 1
                ],
                [
                    "id" => 4,
                    "cat_name" => "SISTec-E",
                    "is_active" => 1
                ],
                [
                    "id" => 5,
                    "cat_name" => "SISTec-MBA",
                    "is_active" => 1
                ],
                [
                    "id" => 6,
                    "cat_name" => "SIPTec",
                    "is_active" => 1
                ],
                [
                    "id" => 7,
                    "cat_name" => "SPS-Bhopal",
                    "is_active" => 1
                ],
                [
                    "id" => 8,
                    "cat_name" => "SPS-SN",
                    "is_active" => 1
                ],
                [
                    "id" => 9,
                    "cat_name" => "SPS-GN",
                    "is_active" => 1
                ],
                [
                    "id" => 10,
                    "cat_name" => "SPS-RN",
                    "is_active" => 1
                ],
                [
                    "id" => 11,
                    "cat_name" => "SPS-RB",
                    "is_active" => 1
                ],
                [
                    "id" => 12,
                    "cat_name" => "SPS-KE",
                    "is_active" => 1
                ],
                [
                    "id" => 13,
                    "cat_name" => "SPS-DD",
                    "is_active" => 1
                ],
                [
                    "id" => 14,
                    "cat_name" => "Sagar Manufacturers Pvt. Ltd.",
                    "is_active" => 1
                ],
                [
                    "id" => 15,
                    "cat_name" => "Sagar Nutriments Pvt. Ltd.",
                    "is_active" => 1
                ],
                [
                    "id" => 16,
                    "cat_name" => "The Sagar",
                    "is_active" => 1
                ],
                [
                    "id" => 17,
                    "cat_name" => "Sagar Multispeciality Hospital",
                    "is_active" => 1
                ],
                [
                    "id" => 18,
                    "cat_name" => "Accounts ERP",
                    "is_active" => 1
                ],
                [
                    "id" => 19,
                    "cat_name" => "Admissions ERP",
                    "is_active" => 1
                ],
                [
                    "id" => 20,
                    "cat_name" => "Lead Management System",
                    "is_active" => 1
                ]
            ]
        );

        $categories->each(function ($category) {
            category::insert($category);
        });
    }
}