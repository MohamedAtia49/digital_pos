<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "ar" => "تلفزيونات",
                "en" => "TVs",
            ],
            [
                "ar" => "لابات",
                "en" => "Laptops",
            ],
            [
                "ar" => "ساعات",
                "en" => "Watches",
            ],
            [
                "ar" => "كاميرات",
                "en" => "Cameras",
            ],
            [
                "ar" => "العاب فيديو",
                "en" => "Video Games",
            ],
            [
                "ar" => "تليفونات",
                "en" => "Mobiles",
            ],
            [
                "ar" => "اكسسوارات",
                "en" => "Accessors",
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category // Save as JSON
            ]);
        }
    }
}
