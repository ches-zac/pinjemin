<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    // fungsi untuk user meminjam barang
    public function pinjam(Request $request)
    {
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventories,id', // Validasi barang
            'user_id' => 'required|exists:users,id',
        ]);

        $inventory = Inventory::findOrFail($validated['inventory_id']);

        // Cek apakah barang tersedia
        if ($inventory->kuota < 1) {
            return redirect()->back()->with('error', 'Barang tidak tersedia.');
        }

        // Kurangi stok barang
        $inventory->decrement('kuota');

        // Simpan data peminjaman
        Lending::create([
            'inventory_id' => $validated['inventory_id'],
            'user_id' => $validated['user_id'],
            'status' => 'dipinjam', // Status awal
        ]);

        return redirect()->route('lendings.index')->with('success', 'Barang berhasil dipinjam.');
    }


    // Kembalikan
    public function kembalikan($id)
    {
        // Mengambil data dari tabel Inventory
        $inventory = Inventory::find($id);
        // Memeriksa ketersediaan barang
        if (!$inventory) {
            throw new \Exception('Barang tidak ditemukan');
        }
        // Update status barang
        $inventory->status = 'tersedia';
        $inventory->save();

        return redirect()->route('')->with('success', 'Barang berhasil dikembalikan');
    }

    // Batalkan
    public function batalkan()
    {

    }
}
