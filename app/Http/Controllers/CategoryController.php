<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function show()
    {
        $categories = Category::paginate(5);
        $title = 'Daftar Kategori';
        return view('admin.category.show', compact('categories', 'title'));
    }

    // Menampilkan form untuk menambah kategori
    public function add()
    {
        $title = 'Tambah Kategori';
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
        return redirect()->route('admin.categories.show')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        $title = 'Edit Kategori';
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

        return redirect()->route('admin.categories.show')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.show')->with('success', 'Kategori berhasil dihapus.');
    }
}
