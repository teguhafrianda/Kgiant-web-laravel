<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Menampilkan daftar produk dan keranjang.
     */
    public function index()
    {
        $products = Product::all();
        $customers = Customer::all();
        $cart = session('cart', []);

        return view('orders.index', compact('products', 'customers', 'cart'));
    }

    /**
     * Menambahkan produk ke keranjang.
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session('cart', []);

        // Jika produk sudah ada di keranjang, update jumlahnya
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('orders.index')->with('success', 'Product added to cart!');
    }

    /**
     * Menghapus produk dari keranjang.
     */
    public function removeFromCart($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->route('orders.index')->with('success', 'Product removed from cart!');
    }

    /**
     * Menyimpan pesanan ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'payment_method' => 'required|in:cash,qris',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('orders.index')->with('error', 'Cart is empty!');
        }

        $customer = null;
        if ($request->customer_id) {
            $customer = Customer::find($request->customer_id);
        }

        // Cek apakah customer sudah mencapai batas reward
        $rewardThreshold = config('settings.reward_threshold');// Default 5 transaksi
        $freeOrder = false;

        if ($customer) {
            $customer->total_purchases += 1;

            if ($customer->total_purchases >= $rewardThreshold) {
                $customer->total_purchases = 0; // Reset hitungan setelah reward
                $freeOrder = true; // Beri diskon 100%
            }

            $customer->save();
        }

        foreach ($cart as $item) {
            Order::create([
                'customer_id' => $customer ? $customer->id : null,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'total_price' => $freeOrder ? 0 : $item['price'] * $item['quantity'],
                'payment_method' => $request->payment_method,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('reports.index')->with('success', $freeOrder ? 'Congratulations! You got a free order!' : 'Order placed successfully!');
    }


    /**
     * Menghapus pesanan.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('reports.index')->with('success', 'Order deleted successfully!');
    }
}
