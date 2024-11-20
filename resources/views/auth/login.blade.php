<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinjemin - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Link CDN untuk FontAwesome -->
  <!-- Link CDN untuk pustaka ikon Flaticon -->
  <link href="https://cdn.jsdelivr.net/npm/@flaticon/font@4.3.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body class="h-screen bg-gray-100 flex items-center justify-center">
  <div class="w-full max-w-[800px] mx-auto flex shadow-lg bg-white rounded-lg overflow-hidden">
    <!-- Left Section -->
    <div class="w-1/2 relative">
      <!-- Background image -->
      <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-white to-blue-400 bg-[length:200%_200%] animate-hologram"></div>
      <!-- Overlay -->

      <!-- Logo and Text -->
      <div class="relative h-full flex flex-col items-center justify-center text-black p-6">
        <h1 class="text-4xl font-bold">Pinjemin</h1>
        <p class="mt-2 text-lg">Sistem peminjaman yang cepat dan mudah.</p>
      </div>
    </div>

    <!-- Right Section -->
    <div class="w-1/2 p-8 flex flex-col justify-center">
      <h2 class="text-2xl font-bold mb-9 text-gray-700 justify-center">Login</h2>
      <!-- Login Form -->
      <form class="space-y-4" method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Username -->
        <div class="flex items-center border rounded-lg p-2">
            <input type="text" placeholder="Username" class="mr-2 w-full border-none focus:ring-0" mr-2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 1c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z"/>
          </svg>
        </div>
        <!-- Password -->
<div class="flex items-center border rounded-lg p-2">
    <input id="password" type="password" placeholder="Password" class="mr-2 w-full border-none focus:ring-0">
    <!-- Mata Tertutup -->
    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" onclick="togglePasswordVisibility()">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4zm0 0c1.38 0 2.62.56 3.54 1.46C19.88 14.86 21 17.08 21 19c0 1.24-.48 2.38-1.28 3.22M3.28 18.22C2.48 17.38 2 16.24 2 15c0-1.92 1.12-4.14 2.46-5.54C6.38 7.56 7.62 7 9 7c2.21 0 4 1.79 4 4s-1.79 4-4 4c-1.38 0-2.62-.56-3.54-1.46C4.12 9.14 3 6.92 3 5c0-1.24.48-2.38 1.28-3.22"/>
      </svg>
      <!-- Mata Terbuka -->
      <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 cursor-pointer hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" onclick="togglePasswordVisibility()">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3C6.48 3 3 7 3 7s3.48 4 9 4c5.52 0 9-4 9-4s-3.48-4-9-4z"/>
      </svg>
  </div>

  <script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const eyeClosed = document.getElementById('eyeClosed');
      const eyeOpen = document.getElementById('eyeOpen');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeClosed.classList.add('hidden'); // Sembunyikan ikon mata tertutup
        eyeOpen.classList.remove('hidden'); // Tampilkan ikon mata terbuka
      } else {
        passwordInput.type = 'password';
        eyeClosed.classList.remove('hidden'); // Tampilkan ikon mata tertutup
        eyeOpen.classList.add('hidden'); // Sembunyikan ikon mata terbuka
      }

      document.getElementById("signButton").addEventListener("click", function() {
        window.location.href = "{{ route('sign') }}";  // Ganti dengan URL halaman signup
    });

    }
  </script>

        <!-- Login Button -->
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-2 font-semibold">
          Login
        </button>


         <!-- SignUP Button -->
        <div>
         <a href="{{ route('regisForm') }}">
         <button id="signButton" type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-2 font-semibold">
            SignUp
          </button>
        </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
