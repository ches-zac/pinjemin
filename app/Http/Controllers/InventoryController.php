<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    // Menampilkan ketersediaan barang
    // public function checkAvailability(Inventory $inventory)
    // {

    //     if ($inventory->kuota > 0) {
    //         return response()->json([
    //             'status' => 'Tersedia',
    //             'sisa_kuota' => $inventory->kuota
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 'Tidak Tersedia',
    //         'sisa_kuota' => 0
    //     ]);
    // }

    // Menampilkan semua barang
    public function showInventory()
    {
        // Ambil data inventory dengan relasi category
        $category = Category::all();
        $title = 'Kategori : Inventori';
        // Jika user biasa, buka view item
        return view('item', compact('category', 'title'));
    }

    public function showForAdmin() {
        $data = Inventory::with('category')->paginate(5);
        $title = 'Data Inventori';
        return view('admin.inventory.show', compact('data', 'title'));
    }

    // Menampilkan form untuk menambah barang
    public function addInventory()
    {
        $title = 'add-inventory';
        $categories = Category::all();
        return view('admin.inventory.add', compact('title', 'categories'));
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
        $categories = Category::all(); // Mengambil semua kategori
        return view('admin.inventory.edit', compact('inventory', 'title', 'categories'));
    }

    // Memperbarui barang
    public function updateInventory(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'kuota' => 'required|numeric|min:0',
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
