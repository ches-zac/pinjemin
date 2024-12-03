@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center w-full">
    <div class="w-1/2 lg:w-1/3 md:w-2/3 sm:w-full bg-white rounded-lg shadow-md overflow-hidden h-[80vh] flex flex-col">
        <div class="p-8 overflow-y-auto">
            <h2 class="text-4xl text-center mb-7 font-semibold text-black">Add Category</h2>

            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- No -->
                <div class="mb-6">
                    <label for="no" class="block mb-2 text-sm font-medium text-black">No</label>
                    <input type="number" id="no" name="no" value="{{ old('no', $category->no) }}"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('no')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama kategori -->
                <div class="mb-6">
                    <label for="nama_kategori" class="block mb-2 text-sm font-medium text-black">Nama kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}"
                        class="bg-[#dd7c1b] border-white text-white placeholder-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('show.profile') }}"
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



















{{--

<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resource/css/app.css', 'resource/js/app.js'])
    <script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
</head>
<button class="bg-rose-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition" onclick="openModal('modelConfirm')">
   Click to Open modal
</button>

<div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class="relative top-40 mx-auto w-1/4 bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Kategori
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal('modelConfirm')">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="mb-4 mx-2">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan nama kategori" required>
                        @error('nama_kategori')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end mr-2 mb-2">
                        <button type="submit" class="bg-blue-500 mr-2 mb-2 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Simpan
                        </button>
                    </div>
                </div>

        </div>
    </div>
</div>
</x-app-layout> --}}

