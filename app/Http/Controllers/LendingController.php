<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Lending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LendingExport;
use Maatwebsite\Excel\Facades\Excel;

class LendingController extends Controller
{
    public function lendForm(Inventory $inventory){
        $title = 'Pinjam Barang';
        return view('lending-per-item', compact('item', 'title'));
    }

    // fungsi untuk user meminjam barang
    public function lend(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'inventory_id' => 'required|exists:inventories,id',
            'ruangan' => 'required|string',
            'jam' => 'required|date_format:H:i',
            'tanggal_peminjaman' => 'required|date',
        ]);

        // Cek ketersediaan barang
        if ($inventory->kuota <= 0) {
            return back()->with('error', 'Barang tidak tersedia.');
        }

        // Kurangi kuota barang
        $inventory->decrement('kuota');

        // Simpan peminjaman
        Lending::create([
            'user_id' => $validated['user_id'],
            'inventory_id' => $validated['inventory_id'],
            'ruangan' => $validated['ruangan'],
            'jam' => $validated['jam'],
            'tanggal_peminjaman' => $validated['tanggal_peminjaman'],
            'status' => 'belum dikembalikan', // Default status
        ]);

        return back()->with('success', 'Peminjaman berhasil.');
    }

    //fungsi untuk melihat barang yang sedang dipinjam
    public function myOnGoingLend() {
        // Ambil peminjaman yang sedang berlangsung oleh user yang terautentikasi
        $ongoingLendings = Lending::with(['user', 'inventory'])->where('user_id', Auth::id()) // Ambil berdasarkan user_id yang sedang login
                                    ->whereNull('tanggal_pengembalian') // Pastikan tanggal pengembalian null (artinya belum dikembalikan)
                                    ->paginate(5);
        return view('my-ongoing-lending', compact('ongoingLendings')); // Kirim data ke view
    }



    // fungsi untuk mengembalikan barang
    public function return(Lending $lending)
    {
        // Pastikan status peminjaman belum dikembalikan
        if ($lending->status === 'dikembalikan') {
            return back()->with('error', 'Barang sudah dikembalikan.');
        }

        // Update status peminjaman
        $lending->update([
            'status' => 'dikembalikan',
            'tanggal_pengembalian' => now(),
        ]);

        // Tambahkan kembali kuota barang
        $inventory = Inventory::findOrFail($lending->inventory_id);
        $inventory->increment('kuota');

        return back()->with('success', 'Barang berhasil dikembalikan.');
    }

    //fitur-fitur khusus admin
    //fungsi lihat seluruh riwayat peminjaman
    public function show()
    {
        $title = "Riwayat Peminjaman";
        $lendings = Lending::with(['inventory', 'user'])->paginate(5);
        return view('admin.lending.show', compact('lendings', 'title'));
    }

    public function filter(Request $request)
    {
        $query = Lending::query();

        // Filter berdasarkan tanggal jika diberikan
        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('tanggal_peminjaman', [$request->from_date, $request->to_date]);
        }

        $lendings = $query->with(['user', 'inventory'])->paginate(5);

        return view('admin.lending.show', compact('lendings'));
    }


    //update status peminjaman data
    // public function update(Request $request, Lending $lending)
    // {
    //     $validated = $request->validate([
    //         'status' => 'string',
    //     ], [
    //         'status.string' => 'Status harus berupa angka.',
    //     ]);

    //     // Perbarui data
    //     if($validated['status'] === 'belum dikembalikan') {
    //         $lending->update([
    //             'status' => $validated['status'],
    //             'tanggal_pengembalian' => nullValue(),
    //         ]);
    //     } else {
    //         $lending->update([
    //             'status' => $validated['status'],
    //             'tanggal_pengembalian' => now(),
    //         ]);
    //     }

    //     return redirect()->route('admin.lending.show')->with('success', 'Data peminjaman berhasil diperbarui.');
    // }

    public function destroy(Lending $lending)
    {
        $lending->delete(); // Hapus data
        return redirect()->route('admin.lending.delete')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    //unduh data peminjaman dalam format pdf

    public function exportToPDF(Request $request)
    {
        // Filter data sesuai input tanggal
        $query = Lending::with(['inventory', 'user']);
        $add_filter = "";

        if ($request->has('from_date') && $request->has('to_date') && $request->from_date && $request->to_date) {
            $query->whereBetween('tanggal_peminjaman', [$request->from_date, $request->to_date]);
            $add_filter = "Rentang waktu: " . $request->from_date . " - " . $request->to_date;
        }

        $lendings = $query->get();

        // Kirim data dan filter ke view
        $pdf = Pdf::loadView('exports.lendings-pdf', compact('lendings', 'add_filter'))
                    ->setPaper('a4', 'landscape'); // Ukuran dan orientasi kertas

        // Unduh file PDF
        return $pdf->download('data_peminjaman.pdf');
    }



    public function exportToExcel($request)
    {
        return Excel::download(new LendingExport($request->from_date, $request->to_date), 'data_peminjaman.xlsx');
    }


}
