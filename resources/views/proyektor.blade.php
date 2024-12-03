@extends('layouts.app')

@section('content')
        <!-- Content -->
        <div class="bg-gray-100 min-h-screen w-full flex items-center justify-center">
            <div class="bg-white p-8 rounded shadow-md">
                <h1 class="text-6xl font-bold text-blue-500 bg-blue-100 p-2 rounded mb-4"><span id="nama-peminjaman"></span></h1>
                <div class="mb-6">
                    <label for="ruangan" class="text-6xl block text-sm font-medium text-gray-700">Ruangan</label>
                    <div class="relative">
                        <input type="text" id="searchInput" class="text-8xl border-gray-300 focus:border-indigo-500 block w-full pl-10 p-2 sm:text-sm rounded-md" placeholder="Cari ruangan">
                        <div class="text-8xl absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <div id="searchResults" class="hidden absolute z-10 bg-white shadow-lg rounded-md max-h-60 overflow-y-auto">
                          </div>
                      </div>
                      <label for="pelajaran" class="text-6xl block text-sm font-medium text-gray-700">Mata Pelajarn</label>
                      <div class="relative">
                          <input type="text" id="searchInput1" class="text-6xl border-gray-300 focus:border-indigo-500 block w-full pl-10 p-2 sm:text-sm rounded-md" placeholder="Pelajaran">
                          <div class="text-6xl absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                          </div>
                          <div id="searchResults1" class="hidden absolute z-10 bg-white shadow-lg rounded-md max-h-60 overflow-y-auto">
                            </div>
                        </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Jam</label>
                    <input type="time" id="tanggal" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pinjam</button>
            </div>
        </div>
    </div>
@endsection


{{-- <script>
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');  
        const searchInput1 = document.getElementById('searchInput1');
        const searchResults1 = document.getElementById('searchResults1');  

        const ruangan = ['Ruangan A', 'Ruangan B', 'Ruangan C', 'Ruangan D'];
        const pelajaran = ['RPL', 'Agama', 'Matematika', 'Cinta'];

        searchInput.addEventListener('input', (event) => {
        const searchTerm = event.target.value.toLowerCase();
        const filteredRuangan = ruangan.filter(ruangan => ruangan.toLowerCase().includes(searchTerm));

        searchResults.innerHTML = filteredRuangan.map(ruangan => `<div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${ruangan}</div>`).join('');

        searchResults.classList.toggle('hidden', filteredRuangan.length === 0);
        });

        // Event delegation for click events on dynamically added room options
        searchResults.addEventListener('click', (event) => {
        if (event.target.tagName === 'DIV') {
            const selectedRuangan = event.target.textContent;
            console.log('Selected room:', selectedRuangan);
            // Do something with the selected room, e.g., update input value
            searchInput.value = selectedRuangan;
            searchResults.classList.add('hidden');
        }
        });

        searchInput1.addEventListener('input', (event) => {
        const searchTerm = event.target.value.toLowerCase();
        const filteredPelajaran1 = pelajaran.filter(pelajaran => pelajaran.toLowerCase().includes(searchTerm));

        searchResults1.innerHTML = filteredPelajaran1.map(pelajaran => `<div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${pelajaran}</div>`).join('');

        searchResults1.classList.toggle('hidden', filteredPelajaran1.length === 0);
        });

        // Event delegation for click events on dynamically added room options
        searchResults1.addEventListener('click', (event) => {
        if (event.target.tagName === 'DIV') {
            const selectedPelajaran = event.target.textContent;
            console.log('Selected room:', selectedPelajaran);
            // Do something with the selected room, e.g., update input value
            searchInput1.value = selectedPelajaran;
            searchResults1.classList.add('hidden');
        }
        });


        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            if (sidebar.classList.contains("w-16")) {
                sidebar.classList.remove("w-16");
                sidebar.classList.add("w-64");
                sidebar.classList.add("md:flex");
            } else {
                sidebar.classList.remove("w-64");
                sidebar.classList.add("w-16");
            }
        }

        // Misalnya Anda mendapatkan nama peminjaman dari localStorage atau API
        const namaPeminjaman = "John Doe"; // Ganti ini dengan data yang Anda ambil dari halaman lain
        document.getElementById('nama-peminjaman').innerText = namaPeminjaman;

      </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Sidebar</title>
    @vite(['resource/css/app.css', 'resource/js/app.js'])

    <style>
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .gradient-animation {
            background: linear-gradient(90deg, #06b6d4, #3b82f6, #9333ea, #f59e0b, #10b981);
            background-size: 300% 300%;
            animation: gradientAnimation 6s ease infinite;
        }

        /* Animasi untuk transisi */
        .transition-width {
            transition: width 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!--Header-->
    <header class="gradient-animation text-white text-center text-2xl font-bold py-4 px-8 sticky top-0 z-50">
        Inventory:PROYEKTOR
    </header>
    <div class="flex h-screen">
        {{-- nambahin sesuatu biar bisa di commit --}}
        <!-- Sidebar -->
        {{-- <div id="sidebar" class="bg-teal-300 w-16 transition-width duration-300 flex flex-col items-center py-6">
            <!-- Toggle Button -->
            <button onclick="toggleSidebar()" class="text-black mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <span class="">PINJEMIN</span>
            </button>

            <!-- Menu Items -->
            <nav class="space-y-6 w-full">
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span class="hidden">Home</span>
                </a>
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="hidden">Profile</span>
                </a>
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <span class="hidden">Documents</span>
                </a>
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" fill="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="hidden">Status</span>
                </a>
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" />
                    </svg>
                    <span class="hidden">Help</span>
                </a>
            </nav>
        </div>

 --}}
