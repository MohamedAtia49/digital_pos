<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => [
                    "ar" => "تلفزيون سامسونج",
                    "en" => "Samsung Tv",
                ],
                'description' => [
                    "ar" => "<h5 style='color: red'><em><strong>تلفزيون سامسونج</strong></em></h5>",
                    "en" => "<h5 style='color: red'><em><strong>Samsung Tv</strong></em></h5>",
                ],
                'purchase_price' => '19500',
                'sale_price' => '21500',
                'stock' => '10',
            ],
            [
                'category_id' => 2,
                'name' => [
                    "ar" => "لابت توب اتش بي",
                    "en" => "Hp Laptop",
                ],
                'description' => [
                    "ar" => "<h5 style='color: blue'><em><strong>لاب توب اتش بي</strong></em></h5>",
                    "en" => "<h5 style='color: blue'><em><strong>Hp Laptop</strong></em></h5>",
                ],
                'purchase_price' => '15500',
                'sale_price' => '18200',
                'stock' => '15',
            ],
            [
                'category_id' => 3,
                'name' => [
                    "ar" => "ساعة آبل",
                    "en" => "Apple Watch",
                ],
                'description' => [
                    "ar" => "<h6 style='color: orange'><strong>ساعة آبل</strong></h6>",
                    "en" => "<h6 style='color: orange'><strong>Apple Watch</strong></h6>",
                ],
                'purchase_price' => '4000',
                'sale_price' => '5200',
                'stock' => '30',
            ],
        ];

        foreach ($products as $key => $value){
            Product::create([
                'category_id' => $value['category_id'],
                'name' => $value['name'],
                'description' => $value['description'],
                'purchase_price' => $value['purchase_price'],
                'sale_price' => $value['sale_price'],
                'stock' => $value['stock'],
            ]);
        }
    }
}
