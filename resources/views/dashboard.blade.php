<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjemin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex h-screen font-sans">
    <!-- Sidebar -->
    <div class="w-36 bg-blue-100 flex flex-col items-center py-6">
        <div class="mb-8">
            <img src="home-icon.png" alt="Home" class="w-8 h-8 mb-6">
            <img src="user-icon.png" alt="User" class="w-8 h-8 mb-6">
            <img src="document-icon.png" alt="Document" class="w-8 h-8 mb-6">
            <img src="check-icon.png" alt="Check" class="w-8 h-8 mb-6">
            <img src="question-icon.png" alt="Help" class="w-8 h-8">
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow p-6">
        <h1 class="text-2xl font-bold mb-6">DASHBOARD</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border-b border-gray-300 text-left">Nama</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left">Barang</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left">Ruangan</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                        <td class="px-4 py-2 border-b border-gray-300"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
