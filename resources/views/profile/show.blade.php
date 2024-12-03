@extends('layouts.app')

@section('content')
<!-- Main Content -->
    <h2 class="text-4xl text-center mb-7 font-semibold text-black">Profile</h2>
    <div class="flex items-center space-x-8">
        <!-- Profile Picture -->
        <div class="w-20 h-20 bg-sky-300 rounded-full overflow-hidden ml-5">
            <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('images/default-profile.jpg') }}"
            alt="Profile Picture"
            class="w-full h-full object-cover">
        </div>
        <!-- Profile Info -->
        <div>
            <p class="text-black text-2xl">{{ 'Nama : ' . Auth::user()->nama }}</p>
            <p class="text-black text-2xl mt-1">{{ 'Terakhir update : ' . Auth::user()->updated_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <div class="mt-5">
        <p class="text-3xl font-semibold text-black mt-3">Data Pengguna:</p>
        <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
        <ul class="text-black list-disc ml-5 mt-1 text-xl">
            <li>{{ 'Email : ' . Auth::user()->email }}</li>
            <li>{{ 'Nomor Telepon : ' . (Auth::user()->no_telp ?? '-')}}</li>
        </ul>
        <a href="{{ route('edit.profile') }}" class="inline-flex items-center px-2 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md mt-5">
            Edit Profil
        </a>
    </div>
@endsection
