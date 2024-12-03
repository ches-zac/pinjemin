@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="bg-white flex-1 p-8">
        <table class="table-auto w-full border border-gray-200">
            <thead>
                <tr class="bg-teal-300">
                    <th class="border border-gray-200 py-2">Nama</th>
                    <th class="border border-gray-200 py-2">Barang</th>
                    <th class="border border-gray-200 py-2">Ruangan</th>
                    <th class="border border-gray-200 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lendings as $lending)
                    <tr>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->user_id->nama }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->inventory_id->nama_barang }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->ruangan }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-gray-200 py-2 text-center">{{ "Data Tidak Tersedia" }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
