<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjemin - Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen font-sans">
    <!-- Sidebar -->
    <div class="w-1/5 gradient-animation p-6">
        <h1 class="text-3xl text-center font-bold text-black mb-8">PINJEMIN</h1>
        <nav class="flex flex-col space-y-6 items-center">
            <!-- Icons (replace with actual icons or SVGs) -->
            <div><svg class="h-24 w-24 text-black-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="5 12 3 12 12 3 21 12 19 12" />  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />  <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg></div> <!-- Home Icon -->
            <div><svg class="h-24 w-24 text-black-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg></div> <!-- User Icon -->
            <div><svg class="h-24 w-24 text-black-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />  <polyline points="14 2 14 8 20 8" />  <line x1="16" y1="13" x2="8" y2="13" />  <line x1="16" y1="17" x2="8" y2="17" />  <polyline points="10 9 9 9 8 9" /></svg></div> <!-- Document Icon -->
            <div><svg class="h-24 w-24 text-black-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <path d="M9 12l2 2l4 -4" /></svg></div> <!-- Check Icon -->
            <div><svg class="h-24 w-24 text-black-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><path d="M12 17h.01"></path></svg></div> <!-- Help Icon -->
        </nav>
    </div>

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
</body>
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
</html>

