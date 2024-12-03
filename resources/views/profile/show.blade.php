@extends('layouts.app')

@section('content')
<!-- Main Content -->
    <h2 class="text-4xl text-center mb-7 font-semibold text-black">Profile</h2>
    <div class="flex items-center space-x-8">
        <!-- Profile Picture -->
        <div class="w-20 h-20 bg-sky-300 rounded-full overflow-hidden ml-5">
            <img id="profile-picture" src="{{ asset('images/default-profile.jpg') }}" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <!-- Profile Info -->
        <div>
            <p class="text-black text-2xl">{{ 'Nama : ' . Auth::user()->nama }}</p>
            <p class="text-black text-2xl mt-1">{{ 'Tanggal bergabung : ' . Auth::user()->created_at }}</p>
        </div>
    </div>
    <div class="mt-5">
        <p class="text-3xl font-semibold text-black mt-3">Data Pengguna:</p>
        <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
        <ul class="text-black list-disc ml-5 mt-1 text-xl">
            <li>{{ 'Email : ' . Auth::user()->email }}</li>
            <li>{{ 'Nomor Telepon : ' . (Auth::user()->no_telp ?? '-')}}</li>
        </ul>
    </div>
@endsection
