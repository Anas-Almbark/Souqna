<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Clothing',
            'Books',
            'Home & Garden',
            'Toys & Games',
            'Sports & Outdoors',
            'Health & Beauty',
            'Automotive',
            'Baby & Kids',
            'Movies & Music',
            'Collectibles',
            'Art & Crafts',
            'Jewelry',];
            foreach ($categories as $category) {
                Category::create([
                    'name' => $category,
                ]);
            }
            
    }
}
