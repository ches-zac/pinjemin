<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function show()
    {
        $itemCategory = Category::all();
        $user = Auth::user()->role;
        if ($user === 'admin') {
            return view('admin.category.show', compact('itemCategory'));
        }
        $title = 'kategori';
        return view('item', compact('itemCategory', 'title'));
    }

    // Menampilkan form untuk menambah kategori
    public function add()
    {
        $title = 'add-kategori';
        return view('admin.category.add', compact('title'));
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|unique:categories,nama_kategori|max:255',
        ],[
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter.',
        ]);
        Category::create($validated);
        return redirect()->route('admin.category.show')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        $title = 'form-kategori';
        return view('admin.category.edit', compact('category', 'title'));
    }

    // Memperbarui kategori
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|unique:categories,nama_kategori,' . $category->id . '|max:255',
        ],[
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter.',
        ]);
        $category->update($validated);

        return redirect()->route('admin.category.show')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.show')->with('success', 'Kategori berhasil dihapus.');
    }
}
