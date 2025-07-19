<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Pastikan import model Products


class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa produk
        Product::create(['name' => 'Burger', 'category_id' => 1, 'price' => 10000]);
        Product::create(['name' => 'Pizza', 'category_id' => 1, 'price' => 20000]);
        // Tambahkan data produk lainnya sesuai kebutuhan
    }
}
