<?php

use App\Models\Category;
use Illuminate\Database\Seeder;


class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Food', 'type' => 'food']);
        Category::create(['name' => 'Drink', 'type' => 'drink']);
        Category::create(['name' => 'Playground', 'type' => 'playground']);
    }
}
