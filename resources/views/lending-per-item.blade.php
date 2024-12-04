@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center w-full">
    <div class="w-1/2 lg:w-1/3 md:w-2/3 sm:w-full bg-white rounded-lg shadow-md overflow-hidden h-[80vh] flex flex-col">
        <div class="p-8 overflow-y-auto">
            <h2 class="text-4xl text-center mb-7 font-semibold text-black">Tambah Barang</h2>

            <form action="{{ route('lending') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="inventory_id" class="block mb-2 text-sm font-medium text-black">Barang</label>
                    <select id="inventory_id" name="inventory_id"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('inventory_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Ruangan -->
                <div class="mb-6">
                    <label for="ruangan" class="block mb-2 text-sm font-medium text-black">ruangan</label>
                    <input type="text" id="ruangan" name="ruangan"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                    @error('ruangan')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Tanggal Peminjaman -->
                <div class="mb-6">
                    <label for="tanggal_peminjaman" class="block mb-2 text-sm font-medium text-black">tanggal_peminjaman</label>
                    <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                    @error('tanggal_peminjaman')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Jam  -->
                <div class="mb-6">
                    <label for="jam" class="block mb-2 text-sm font-medium text-black">jam</label>
                    <input type="time" id="jam" name="jam"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                    @error('kuota')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('item.categories') }}"
                       class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        Kembali
                    </a>

                    <!-- Tombol Simpan -->
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pinjam
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
