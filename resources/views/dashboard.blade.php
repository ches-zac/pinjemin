<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


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
        Dashboard
    </header>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-sidenav></x-sidenav>

        <!-- Content -->
        <div class="bg-white flex-1 p-8">
            <table class="table-auto w-full border border-gray-200">
                <thead>
                    <tr class="bg-teal-300">
                        <th class="border border-gray-200 py-2">Nama</th>
                        <th class="border border-gray-200 py-2">Barang</th>
                        <th class="border border-gray-200 py-2">Ruangan</th>
                        <th class="border border-gray-200 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-200 py-2 text-center">Data 1</td>
                        <td class="border border-gray-200 py-2 text-center">Data 2</td>
                        <td class="border border-gray-200 py-2 text-center">Data 3</td>
                        <td class="border border-gray-200 py-2 text-center">Data 4</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-200 py-2 text-center">Data 5</td>
                        <td class="border border-gray-200 py-2 text-center">Data 6</td>
                        <td class="border border-gray-200 py-2 text-center">Data 7</td>
                        <td class="border border-gray-200 py-2 text-center">Data 8</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
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
