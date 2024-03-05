<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Food and Beverage',
            'slug' => 'food-and-beverage'
        ]);
        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion'
        ]);
        Category::create([
            'name' => 'Business',
            'slug' => 'business'
        ]);
    }
}
