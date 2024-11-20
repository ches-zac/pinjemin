<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class InventoryController extends Controller
{
    // Menampilkan ketersediaan barang
    public function tersedia()
    {
        // Menghitung jumlah barang yang dipinjam
        $data = Inventory::count('kuota')->get();
        //kayaknya ini mending dihubungin sama method pinjem deh. soalnya kalo langsung count dari model lending kan jadinya udah harus kirim form pinjem dulu
        $dipinjam = Lending::count();
        if ($dipinjam < $data) {return 'Tersedia';} else {return 'Tidak Tersedia';};
    }

    // Menampilkan semua barang
    public function showInventory()
    {
        $data = Inventory::all();
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
            'kuota' => 'required|numeric',
        ],[
            'kuota.required' => 'Kuota wajib diisi.',
            'kuota.numeric' => 'Kuota harus berupa angka.',
        ]);
        Inventory::create($validated);
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
            'kuota' => 'required|numeric',
        ],[
            'kuota.required' => 'Kuota wajib diisi.',
            'kuota.numeric' => 'Kuota harus berupa angka.',
        ]);
        $inventory->update($validated);
        return redirect()->route('admin.inventory.show')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus barang
    public function destroyInventory(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('admin.inventory.show')->with('success', 'Barang berhasil dihapus.');
    }
}
