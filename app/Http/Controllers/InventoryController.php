<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Lending;
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
    public function pinjam()
    {

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
