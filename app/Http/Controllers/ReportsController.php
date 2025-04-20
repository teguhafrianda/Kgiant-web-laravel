<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        // Ambil semua order dengan customer dan product
        $orders = Order::with(['customer', 'product'])->latest()->paginate(10);

        return view('reports.index', compact('orders'));
    }
}
