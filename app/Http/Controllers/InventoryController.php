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
        //kayaknya ini mending dihubungin sama method pinjem deh. soalnya kalo langsung count dari model lending kan jadinya udah harus kirim form pinjem dulu
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
