<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjemin Dashboard </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
