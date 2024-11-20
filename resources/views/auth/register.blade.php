
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
  @vite(['resource/css/app.css', 'resource/js/app.js'])

</head>
<body class="h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-[800px] mx-auto flex shadow-lg bg-white rounded-lg overflow-hidden">

      <div class="w-1/2 p-8 flex flex-col justify-center">
        <h2 class="text-2xl font-bold mb-9 text-gray-700 justify-center">SignUP</h2>
        <form class="space-y-4" method="POST" action="{{ route('register') }}">
            @csrf
          <div class="flex items-center border rounded-lg p-2">
            <input type="text" placeholder="Name" class="mr-2 w-full border-none focus:ring-0" mr-2>
            <svg xmlns="http://www.w3.org/200/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 1c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z"/>
            </svg>
          </div>
          <div class="flex items-center border rounded-lg p-2">
            <input type="text" placeholder="Username" class="mr-2 w-full border-none focus:ring-0" mr-2>
            <svg xmlns="http://www.w3.org/200/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 1c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z"/>
            </svg>
          </div>
          <div class="flex items-center border rounded-lg p-2">
            <input id="password" type="password" placeholder="Password" class="mr-2 w-full border-none focus:ring-0">
            <svg id="eyeClosed" xmlns="http://www.w3.org/200/svg" class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" onclick="togglePasswordVisibility()">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
            <svg id="eyeOpen" xmlns="http://www.w3.org/200/svg" class="h-6 w-6 text-gray-400 cursor-pointer hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" onclick="togglePasswordVisibility()">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
            </svg>
          </div>
          <div class="flex items-center border rounded-lg p-2">
            <input id="password1" type="password" placeholder="Confirm Password" class="mr-2 w-full border-none focus:ring-0">
            <svg id="eyeClosed1" xmlns="http://www.w3.org/200/svg" class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" onclick="togglePasswordVisibility1()">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
            <svg id="eyeOpen1" xmlns="http://www.w3.org/200/svg" class="h-6 w-6 text-gray-400 cursor-pointer hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" onclick="togglePasswordVisibility1()">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
            </svg>
          </div>
          <div>
          <a href="{{ route('login') }}">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">SignUp</button>
          </a></div>
        </form>
      </div>

      <div class="w-1/2 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-200 via-blue to-blue-600 bg-[length:200%_200%] animate-hologram"></div>
        <div class="relative h-full flex flex-col items-center justify-center text-black p-6">
          <h1 class="text-4xl font-bold">Pinjemin</h1>
          <p class="mt-2 text-lg">Sistem peminjaman yang cepat dan mudah.</p>

        </div>
      </div>
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

<<<<<<< HEAD
    }

    function togglePasswordVisibility1() {
    const passwordInput = document.getElementById('password1');
      const eyeClosed1 = document.getElementById('eyeClosed1');
      const eyeOpen1 = document.getElementById('eyeOpen1');
=======
        {{-- <!-- Role Dropdown -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div> --}}

        <div class="flex items-center justify-end mt-4 px-1">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
>>>>>>> 4b78c207ddc226c3469d89f0ed95198d495e8cdb

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeClosed1.classList.add('hidden'); // Sembunyikan ikon mata tertutup
        eyeOpen1.classList.remove('hidden'); // Tampilkan ikon mata terbuka
      } else {
        passwordInput.type = 'password';
        eyeClosed1.classList.remove('hidden'); // Tampilkan ikon mata tertutup
        eyeOpen1.classList.add('hidden'); // Sembunyikan ikon mata terbuka
      }

    }

</script>
</x-guest-layout>
