<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Category;
use App\Models\Lending;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Menampilkan ketersediaan barang
    public function checkAvailability(Inventory $inventory)
    {

        if ($inventory->kuota > 0) {
            return response()->json([
                'status' => 'Tersedia',
                'sisa_kuota' => $inventory->kuota
            ]);
        }

        return response()->json([
            'status' => 'Tidak Tersedia',
            'sisa_kuota' => 0
        ]);
    }

    // Menampilkan semua barang
    public function showInventory()
    {
        $data = Inventory::with('category')->get(); // Ambil semua data inventory
        $category = Category::all();
        $title = 'Daftar Inventori';
        // if()
        return view('item', compact('data', 'category', 'title'));
    }



    // Menampilkan form untuk menambah barang
    public function addInventory()
    {
        $title = 'add-inventory';
        return view('admin.inventory.add', compact('title'));
    }

    // Menyimpan barang baru
    public function storeInventory(Request $request)
    {
        $validated = $request->validate([
            'kuota' => 'required|numeric|min:1',
            'nama_barang' => 'required|string|max:255',
            'category_id' => 'required|numeric|exists:categories,id',
        ], [
            'kuota.required' => 'Kuota wajib diisi.',
            'kuota.numeric' => 'Kuota harus berupa angka.',
            'kuota.min' => 'Kuota minimal harus 1.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'category_id.required' => 'Kategori wajib diisi.',
        ]);

        Inventory::create($validated); // Tambahkan data baru
        return redirect()->route('admin.inventory.show')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit barang
    public function editInventory(Inventory $inventory)
    {
        $title = 'Edit Item Inventori';
        return view('admin.inventory.edit', compact('inventory', 'title'));
    }

    // Memperbarui barang
    public function updateInventory(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'kuota' => 'required|numeric|min:1',
            'nama_barang' => 'required|string|max:255',
            'category_id' => 'required|numeric|exists:categories,id',
        ], [
            'kuota.required' => 'Kuota wajib diisi.',
            'kuota.numeric' => 'Kuota harus berupa angka.',
            'kuota.min' => 'Kuota minimal harus 1.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'category_id.required' => 'Kategori wajib diisi.',
        ]);

        $inventory->update($validated); // Perbarui data
        return redirect()->route('admin.inventory.show')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus barang
    public function destroyInventory(Inventory $inventory)
    {
        $inventory->delete(); // Hapus data
        return redirect()->route('admin.inventory.show')->with('success', 'Barang berhasil dihapus.');
    }
}
