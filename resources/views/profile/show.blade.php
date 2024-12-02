@extends('layouts.app')

@section('content')

<!-- Main Content -->
    <div class="flex-1 bg-gray-100 p-8">
        <h2 class="text-5xl text-center mb-7 font-semibold text-black">Profile</h2>
        <div class="flex items-center space-x-8">
            <!-- Profile Picture -->
            <div class="w-44 h-44 bg-sky-300 rounded-full ml-5"></div>
            <!-- Profile Info -->
            <div>
                <p class="text-black text-2xl">Nama: Nama Pengguna</p>
                <p class="text-black text-2xl mt-1">NIP/NIS: 123456</p>
            </div>
        </div>
        <div>
            <p class="text-5xl font-semibold text-black mt-3">Data Pengguna:</p>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <ul class="text-black list-disc ml-5 mt-1 text-xl">
                <li>Data 1</li>
                <li>Data 2</li>
            </ul>
        </div>
    </div>
@endsection
