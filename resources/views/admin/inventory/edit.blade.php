@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center w-full">
    <div class="w-1/2 lg:w-1/3 md:w-2/3 sm:w-full bg-white rounded-lg shadow-md overflow-hidden h-[80vh] flex flex-col">
        <div class="p-8 overflow-y-auto">
            <h2 class="text-4xl text-center mb-7 font-semibold text-black">{{ 'Edit Barang : ' . $inventory->nama_barang }}</h2>
            <form action="{{ route('admin.inventory.update', $inventory) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Barang -->
                <div class="mb-6">
                    <label for="nama_barang" class="block mb-2 text-sm font-medium text-black">Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $inventory->nama_barang) }}"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                    @error('nama_barang')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Kategori -->
                <div class="mb-6">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-black">Kategori</label>
                    <select id="category_id" name="category_id"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                        {{-- <option value="">-- Pilih Kategori --</option> --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $inventory->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Kuota  -->
                <div class="mb-6">
                    <label for="kuota" class="block mb-2 text-sm font-medium text-black">Kuota</label>
                    <input type="kuota" id="kuota" name="kuota" value="{{ old('kuota', $inventory->kuota) }}"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5" required>
                    @error('kuota')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('admin.inventory.show') }}"
                       class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        Kembali
                    </a>

                    <!-- Tombol Simpan -->
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
