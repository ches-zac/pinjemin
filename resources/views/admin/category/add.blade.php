<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

        <form action="{{ route('admin.store.category') }}" method="POST">
            @csrf
            <div class="bg-white p-6 shadow rounded-lg">
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama kategori" required>
                    @error('nama_kategori')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
