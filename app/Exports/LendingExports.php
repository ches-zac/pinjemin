<?php
namespace App\Exports;

use App\Models\Lending;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LendingExport implements FromCollection, WithHeadings, WithMapping
{
    private $from_date;
    private $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function collection()
    {
        $query = Lending::with(['inventory', 'user']);

        if ($this->from_date && $this->to_date) {
            $query->whereBetween('tanggal_peminjaman', [$this->from_date, $this->to_date]);
        }

        return $query->get();
    }

    public function headings(): array
    {
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
        static $counter = 0;
        $counter++;

        return [
            $counter,
            $lending->user->nama,
            $lending->inventory->nama_barang,
            $lending->ruangan,
            $lending->tanggal_peminjaman,
            $lending->tanggal_pengembalian,
            $lending->status,
        ];
    }
}
