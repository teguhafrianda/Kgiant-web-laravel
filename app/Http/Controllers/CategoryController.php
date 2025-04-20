<?php

namespace App\Http\Controllers;

use App\Models\Category; // Ganti dari Categories ke Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::all(); // Mengambil semua kategori dari database
        return view('category.index', compact('categories')); // Mengirim data kategori ke view
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:drink,food,playground', // Validasi tipe kategori
        ]);

        // Menyimpan kategori baru ke database
        Category::create($request->only('name', 'type'));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Menghapus kategori dari database
    public function destroy($id)
    {
        // Mencari kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Menghapus kategori
        $category->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
