@extends('layouts.app')

@section('content')
    <form method="GET" action="{{ route('admin.lending.filter') }}" class="flex justify-between mb-4">
        <label for="from_date" class="text-sm font-medium">From Date:</label>
        <input type="date" id="from_date" name="from_date" value="{{ request('from_date') }}" class="rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <label for="to_date" class="text-sm font-medium">To Date:</label>
        <input type="date" id="to_date" name="to_date" value="{{ request('to_date') }}" class="rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="ml-2">Filter</span>
        </button>
    </form>

    <!-- Content -->
    <div class="bg-white flex-1 px-8 py-2">
        <table class="table-auto w-full border border-gray-200">
            <thead>
                <tr class="bg-teal-300">
                    <th class="border border-gray-200 py-2">No</th>
                    <th class="border border-gray-200 py-2">Nama</th>
                    <th class="border border-gray-200 py-2">Barang</th>
                    <th class="border border-gray-200 py-2">Tanggal Pinjam</th>
                    <th class="border border-gray-200 py-2">Jam</th>
                    <th class="border border-gray-200 py-2">Tanggal Pengembalian</th>
                    <th class="border border-gray-200 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lendings as $lending)
                    <tr>
                        <td class="border border-gray-200 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->user->nama }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->inventory->nama_barang }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->tanggal_peminjaman }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ $lending->jam }}</td>
                        <td class="border border-gray-200 py-2 text-center">{{ ($lending->tanggal_pengembalian ?? '-') }}</td>
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
    <div class="mt-4">
        {{ $lendings->appends(request()->query())->links() }}
    </div>
    <div class="mt-4 flex justify-end">
        <a href="{{  route('admin.lending.download.pdf', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}"
            id="export-pdf" class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1h16v-1H4zM4 10v4H2v4h2v-4zM22 9l-10-10-10 10" />
            </svg> --}}
            <span class="ml-2">Ekspor PDF</span>
        </a>
    </div>
@endsection
