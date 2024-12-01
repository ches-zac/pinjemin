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
                <tr>
                    <td class="border border-gray-200 py-2 text-center">Data 1</td>
                    <td class="border border-gray-200 py-2 text-center">Data 2</td>
                    <td class="border border-gray-200 py-2 text-center">Data 3</td>
                    <td class="border border-gray-200 py-2 text-center">Data 4</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 py-2 text-center">Data 5</td>
                    <td class="border border-gray-200 py-2 text-center">Data 6</td>
                    <td class="border border-gray-200 py-2 text-center">Data 7</td>
                    <td class="border border-gray-200 py-2 text-center">Data 8</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
