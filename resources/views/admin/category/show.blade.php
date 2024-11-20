<x-app-layout>
    <div class="container">
        <h1>Daftar Kategori</h1>
        <a href="{{ route('admin.categories.add') }}" class="btn btn-primary">Tambah Kategori</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itemCategory as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
