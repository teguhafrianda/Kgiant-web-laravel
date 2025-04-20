<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_price',
        'payment_method', // Tambahkan ini
    ];

    // Relasi ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class)->withDefault(); // Jika null, tampilkan "Guest"
    }

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
