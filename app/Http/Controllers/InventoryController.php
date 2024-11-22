<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Lending;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Menampilkan ketersediaan barang
    public function cekKetersediaan($inventoryId)
    {
        $inventory = Inventory::findOrFail($inventoryId);

        if ($inventory->kuota > 0) {
            return response()->json([
                'status' => 'Tersedia',
                'sisa_stok' => $inventory->kuota,
            ]);
        }

        return response()->json([
            'status' => 'Tidak Tersedia',
            'sisa_stok' => 0,
        ]);
    }


    // Menampilkan semua barang
    public function showInventory()
    {
        $data = Inventory::all(); // Ambil semua data inventory
        return view('admin.inventory.show', compact('data'));
    }

    // Menampilkan form untuk menambah barang
    public function addInventory()
    {
        return view('admin.inventory.add');
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
            'category_id.required' => 'Nama barang wajib diisi.',
        ]);

        Inventory::create($validated); // Tambahkan data baru
        return redirect()->route('admin.inventory.show')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit barang
    public function editInventory(Inventory $inventory)
    {
        return view('admin.inventory.edit', compact('inventory'));
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
            'category_id.required' => 'Nama barang wajib diisi.',
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
