<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class InventoryController extends Controller
{
    // Tersedia
    public function tersedia()
    {
        // Menghitung jumlah barang yang dipinjam
        $data = Inventory::count('kuota')->get();
        $dipinjam = Lending::count();
        if ($dipinjam < $data) {return 'Tersedia';} else {return 'Tidak Tersedia';};
    }

    // Pinjam
    public function pinjam(Request $request)
    {
        // Cek ketersediaan barang
        if (!$this->tersedia())
        {
            return false; // Atau throw exception
        }

        // Buat record peminjaman baru
        $peminjaman = new Lending();
        $peminjaman->user_id = User::select('nama')->get();
        $peminjaman->inventory_id = Inventory::select('inventory_id')->get();
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
        $peminjaman->save();

        // return redirect()->route('')->with('success', 'Peminjaman Berhasil')

    }

    // Kembalikan
    public function kembalikan()
    {

    }

    // Pengembalian
    public function pengembalian()
    {

    }
}
