<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>{{ 'Login' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen">
    <div class="flex-1 bg-blue-500 text-white p-16 text-center mt-3">
        <h1 class="text-4xl font-bold">PINJEMIN</h1>
        <p class="mt-4">Platform pinjaman online terpercaya</p>
    </div>
    <div class="flex-1 bg-white p-16">
        <h2 class="text-2xl font-bold mb-4">Masuk</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Masukkan email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="Masukkan password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Masuk
                </button>

                {{-- NANTI INI DIRAPIHIN YAK --}}
                <a href="{{ route('regisForm') }}" class="hover:bg-gray-100 text-blue font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Belum punya akun?</a>
            </div>
        </form>
    </div>
</body>
</html>
