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

        <a href="{{ route('edit.profile') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.585 3.58555L11.17 5.00055C10.7578 5.38777 10.5 5.90535 10.5 6.41988C10.5 6.93441 10.7578 7.45203 11.17 7.83925L14.19 10.8593L11.17 13.8785C10.7578 14.2657 10.5 14.7833 10.5 15.3008C10.5 15.8183 10.7578 16.3359 11.17 16.7231L13.585 19.1421C13.9992 19.5393 14.5268 19.5393 14.9401 19.1421C15.3533 18.7449 15.3533 18.1115 14.9401 17.7144L12.4141 15.1894L14.9401 12.6644C15.3533 12.2672 15.3533 11.6338 14.9401 11.2366L13.585 8.81155C13.2018 8.41435 12.6774 8.41435 12.2932 8.82842Z" />
            </svg>
            Edit Profil
        </a>
    </div>
@endsection
