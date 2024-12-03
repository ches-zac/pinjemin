@extends('layouts.app')

@section('content')
<!-- Content -->
        <div class="bg-white flex-1 p-8">
            <table class="table-auto w-full border border-gray-200">
                <thead>
                    <tr class="bg-teal-300">
                        <th class="border border-gray-200 py-2">No</th>
                        <th class="border border-gray-200 py-2">Barang</th>
                        <th class="border border-gray-200 py-2">Kategori</th>
                        <th class="border border-gray-200 py-2">Kuota</th>
                        <th class="border border-gray-200 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-200 py-2 text-center">Data 1</td>
                        <td class="border border-gray-200 py-2 text-center">Data 2</td>
                        <td class="border border-gray-200 py-2 text-center">Data 3</td>
                        <td class="border border-gray-200 py-2 text-center">Data 4</td>
                        <td class="border border-gray-200 py-2 text-center">
                            <button class="text-black font-bold py-2 px-4 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-200 py-2 text-center">Data 5</td>
                        <td class="border border-gray-200 py-2 text-center">Data 6</td>
                        <td class="border border-gray-200 py-2 text-center">Data 7</td>
                        <td class="border border-gray-200 py-2 text-center">Data 8</td>
                        <td class="border border-gray-200 py-2 text-center">
                            <button class="text-black font-bold py-2 px-4 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                + TAMBAH PENGGUNA
            </button>
        </div>
    </div>
@endsection

{{-- 
    <script>
        // Fungsi untuk mengambil data pengguna dari backend
        async function fetchData() {
        try {
            const response = await fetch('/api/users'); // Ganti dengan endpoint Anda
            const data = await response.json();

            // Update tampilan tabel dengan data yang baru diambil
            updateTable(data);
        } catch (error) {
            console.error('Error fetching data:', error);
        }
        }

        // Fungsi untuk memperbarui tampilan tabel
        function updateTable(data) {
        const tableBody = document.querySelector('tbody');
        tableBody.innerHTML = ''; // Kosongkan tabel terlebih dahulu

        data.forEach(user => {
            const row = document.createElement('tr');
            // ... tambahkan sel-sel tabel dengan data pengguna ...
            row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>
                <button onclick="deleteData(${user.id})">Hapus</button>
            </td>
            `;
            tableBody.appendChild(row);
        });
        }

        // Fungsi untuk menghapus data pengguna
        async function deleteData(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            try {
            const response = await fetch(`/api/users/${id}`, { method: 'DELETE' });
            if (response.ok) {
                console.log('Data berhasil dihapus');
                fetchData(); // Panggil kembali fetchData untuk memperbarui tabel
            } else {
                console.error('Gagal menghapus data');
            }
            } catch (error) {
            console.error('Terjadi kesalahan:', error);
            }
        }
        }

        // Panggil fetchData() saat halaman dimuat untuk mengambil data awal
        fetchData();
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
        Data Inventory - ADMIN
    </header>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed bg-teal-300 w-16 transition-width duration-300 flex flex-col items-center py-6">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                    </svg>
                    <span class="hidden">Profile</span>
                </a>
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="hidden">Documents</span>
                </a>
                <a href="#" class="text-black flex items-center gap-4 p-2 hover:bg-teal-400 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto md:mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
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
