@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center w-full">
    <div class="w-1/2 lg:w-1/3 md:w-2/3 sm:w-full bg-white rounded-lg shadow-md overflow-hidden h-[80vh] flex flex-col">
        <div class="p-8 overflow-y-auto">
            <h2 class="text-4xl text-center mb-7 font-semibold text-black">Add Category</h2>

            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Nama kategori -->
                <div class="mb-6">
                    <label for="nama_kategori" class="block mb-2 text-sm font-medium text-black">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-[#dd7c1b]-500 focus:border-[#dd7c1b]-500 block w-full p-2.5">
                    @error('nama_kategori')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('admin.categories.show') }}"
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
