<x-app-layout>
    <div class="header">
        ini halaman tambah kategori sederhana
    </div>
    <form action="" method="post">
        @csrf
        <label>Nama Kategori : </label>
        <input type="text" name="nama_kategori">
        <button type="submit">Tambah Kategori</button>
    </form>

</x-app-layout>
