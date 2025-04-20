<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products; // Pastikan import model Products

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa produk
        Products::create(['name' => 'Burger', 'category_id' => 1, 'price' => 10000]);
        Products::create(['name' => 'Pizza', 'category_id' => 1, 'price' => 20000]);
        // Tambahkan data produk lainnya sesuai kebutuhan
    }
}
