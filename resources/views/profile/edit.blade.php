<x-app-layout>
<h2 class="text-4xl text-center mb-7 font-semibold text-black">Edit Profil</h2>

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('nama')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-6">
        <label for="profile_picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto Profil</label>
        <input type="file" id="profile_picture" name="profile_picture" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Simpan Perubahan
    </button>
</form>
</x-app-layout>
