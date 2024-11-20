<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function show()
    {
        $itemCategory = Category::all();
        return view('category.show', compact('itemCategory'));
    }

    // Menampilkan form untuk menambah kategori
    public function add()
    {
        return view('category.add');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:kategori_barangs|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriBarang::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(KategoriBarang $kategoriBarang)
    {
        return view('kategori.edit', compact('kategoriBarang'));
    }

    // Memperbarui kategori
    public function update(Request $request, KategoriBarang $kategoriBarang)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:kategori_barangs,nama,' . $kategoriBarang->id . '|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategoriBarang->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy(KategoriBarang $kategoriBarang)
    {
        $kategoriBarang->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
