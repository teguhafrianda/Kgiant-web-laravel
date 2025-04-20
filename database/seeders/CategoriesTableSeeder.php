<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Contoh CategoriesTableSeeder
    public function run()
    {
        \App\Models\Categories::create(['name' => 'Food', 'type' => 'food']);
        \App\Models\Categories::create(['name' => 'Drink', 'type' => 'drink']);
        \App\Models\Categories::create(['name' => 'Playground', 'type' => 'playground']);
    }

}
