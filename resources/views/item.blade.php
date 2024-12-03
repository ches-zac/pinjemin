@extends('layouts.app')

@section('content')
        <!-- Content -->
        @foreach ($category as $item)
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <div class="bg-blue-100 p-4 rounded-lg">
                <h2 class="text-lg font-bold">{{ $item->nama_kategori }}</h2>
                <select id="projectSelect1" class="w-full mt-2 rounded-md border-gray-300">
                    @foreach ($data as $itemDetail)
                        <option value={{ $itemDetail->kuota }}>{{ $itemDetail->nama_barang }} ({{ $itemDetail->kuota }})</option>
                    @endforeach
                </select>
                <div class="mt-2">Kuota: <span id="kuota-proyektor1">{{ $item->category->kuota }}</span></div>
                <button id="pinjam-proyektor" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Pinjam</button>
              </div>
              </div>
          </div>
        @endforeach


          {{-- <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <div class="bg-blue-100 p-4 rounded-lg">
                <h2 class="text-lg font-bold">Speaker</h2>
                <select id="projectSelect1" class="w-full mt-2 rounded-md border-gray-300">
                  <option value="10">Speaker A (10 kuota)</option>
                  <option value="20">Speaker B (20 kuota)</option>
                </select>
                <div class="mt-2">Kuota: <span id="kuota-proyektor1">{{ $data->kuota}}</span></div>
                <button id="pinjam-proyektor" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Pinjam</button>
              </div>
              </div>
          </div>

          <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <div class="bg-blue-100 p-4 rounded-lg">
                <h2 class="text-lg font-bold">Alat Tulis</h2>
                <select id="projectSelect1" class="w-full mt-2 rounded-md border-gray-300">
                  <option value="10">Alat Tulis A (10 kuota)</option>
                  <option value="20">Alat Tulis B (20 kuota)</option>
                </select>
                <div class="mt-2">Kuota: <span id="kuota-proyektor1">10</span></div>
                <button id="pinjam-proyektor" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Pinjam</button>
              </div>
              </div>
          </div> --}}
@endsection


{{--



        <script>

        const projectSelects = document.querySelectorAll('select');
        const kuotaElements = document.querySelectorAll('.kuota');
        const pinjamButtons = document.querySelectorAll('.pinjam-button');

        projectSelects.forEach((select, index) => {
            select.addEventListener('change', () => {
        const selectedValue = select.value;
            kuotaElements[index].textContent = `Kuota: ${selectedValue}`;
            });
        });

        pinjamButtons.forEach(button => {
            button.addEventListener('click', () => {
        const kuotaElement = button.previousElementSibling.querySelector('.kuota');
        const currentKuota = parseInt(kuotaElement.textContent.split(' ')[1]);

            if (currentKuota > 0) {
                kuotaElement.textContent = `Kuota: ${currentKuota - 1}`;
                button.disabled = true;
                alert('Item berhasil dipinjam.');
            } else {
                alert('Kuota sudah habis.');
            }
            });
        });

        const projectSelect = document.getElementById('projectSelect');
        const kuotaElement = document.getElementById('kuota');

            projectSelect.addEventListener('change', () => {
        const selectedValue = projectSelect.value;
              kuotaElement.textContent = `Kuota: ${selectedValue}`;
            });

        const proyektorButton = document.getElementById('proyektorButton');
        const proyektorDropdown = document.getElementById('proyektorDropdown');

        proyektorButton.addEventListener('click', () => {
        proyektorDropdown.classList.toggle('hidden');
        });

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
    <script src="https://cdn.tailwindcss.com"></script>
    <!--@vite(['resource/css/app.css', 'resource/js/app.js'])-->

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
        Inventory:ITEM
    </header>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-teal-300 w-16 transition-width duration-300 flex flex-col items-center py-6">
            <!-- Toggle Button -->
            <button onclick="toggleSidebar()" class="text-black mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
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
        </div> --}}
