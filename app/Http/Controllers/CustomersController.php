<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    // Menampilkan semua customer
    public function index()
    {
        // Ambil semua data customer dari database
        $customers = Customer::all();

        // Kirim data ke view
        return view('customers.index', compact('customers'));
    }

    // Menyimpan customer baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
        ]);

        // Simpan customer baru
        Customer::create($request->only('name', 'phone'));

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    // Menghapus customer
    public function destroy(Customer $customer)
    {
        // Hapus customer dari database
        $customer->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
