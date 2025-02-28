<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {


        // إنشاء 10 منتجات وهمية
        Product::factory(20)->create()->each(function ($product) {
            // ربط كل منتج بـ 1 إلى 3 تصنيفات عشوائية
            $categories = Category::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            $product->categories()->attach($categories);

            // إنشاء صور لكل منتج
            ProductPhoto::factory(rand(2, 5))->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
