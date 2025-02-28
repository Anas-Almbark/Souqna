<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductPhoto;
use App\Models\Product;

class ProductPhotoFactory extends Factory
{
    protected $model = ProductPhoto::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(), // منتج مرتبط
            'url' => 'https://source.unsplash.com/400x300/?product&random=' . rand(1, 1000), // صور منتجات عشوائية
        ];
    }
}
