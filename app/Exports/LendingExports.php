<?php
namespace App\Exports;

use App\Models\Lending;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LendingExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Ambil data lending beserta relasinya
        return Lending::with(['inventory', 'user'])->get();
    }

    public function headings(): array
    {
        // Header kolom di file Excel
        return [
            'Nomor',
            'Nama User',
            'Nama Barang',
            'Ruangan',
            'Tanggal Peminjaman',
            'Tanggal Pengembalian',
            'Status',
        ];
    }

    public function map($lending): array
    {
        // Mapping data yang akan ditampilkan di setiap kolom
        return [
            $lending->id,
            $lending->user->name,
            $lending->inventory->nama_barang,
            $lending->ruangan,
            $lending->tanggal_peminjaman,
            $lending->tanggal_pengembalian,
            $lending->status,
        ];
    }
}
