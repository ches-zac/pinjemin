@extends('layouts.app')

@section('content')
        <!-- Content -->
        <div class="bg-white flex-1 p-8">
            <table class="table-auto w-full border border-gray-200">
                <thead>
                    <tr class="bg-teal-300">
                        <th class="border border-gray-200 py-2">No</th>
                        <th class="border border-gray-200 py-2">Barang</th>
                        <th class="border border-gray-200 py-2">Ruangan</th>
                        <th class="border border-gray-200 py-2">Jam</th>
                        <th class="border border-gray-200 py-2 flex item-center">
                            Kembalikan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ongoingLending as $item)
                        <tr>
                            <td class="border border-gray-200 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-200 py-2 text-center">{{ $item->inventory_id->nama_barang }}</td>
                            <td class="border border-gray-200 py-2 text-center">{{ $item->ruangan }}</td>
                            <td class="border border-gray-200 py-2 text-center">{{ $item->jam }}</td>
                            <td>
                                <a href="{{ route('lending.return', $item)}}" class="border border-gray-200 py-2 flex item-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<div class="mt-4">
        {{ $ongoingLending->links() }}
</div>
    </div>
@endsection


{{-- <script>

        const iconButton = document.querySelector('.border.border-gray-200.py-2.flex.items-center.justify-center'); // Select the button element

        iconButton.addEventListener('click', () => {
        // Your JavaScript code to execute on click (e.g., open a modal, sort data)
        console.log('Icon clicked!'); // Example placeholder
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
        Status Peminjaman Saya
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
        </div>
 --}}
