<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ "Pinjemin | " . ($title ?? 'Dashboard') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
{{-- <body class="bg-gray-100">
    <x-header />
    <div class="flex h-screen">
        <x-sidenav />
        <main class="bg-white flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body> --}}

<body class="bg-gray-100">
    <x-header />
    <div class="flex h-screen">
    @if (auth()->user()->isAdmin())
        <x-sidenav-admin />
    @else
        <x-sidenav />
    @endif
        <main class="bg-white flex-1 p-8 ml-16 items-center justify-center">
            @yield('content')
        </main>
    </div>
</body>
</html>
