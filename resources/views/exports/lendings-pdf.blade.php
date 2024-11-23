<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Data Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Ruangan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lendings as $lending)
            <tr>
                <td>{{ $lending->id }}</td>
                <td>{{ $lending->user->name }}</td>
                <td>{{ $lending->inventory->nama_barang }}</td>
                <td>{{ $lending->ruangan }}</td>
                <td>{{ $lending->tanggal_peminjaman }}</td>
                <td>{{ $lending->tanggal_pengembalian }}</td>
                <td>{{ $lending->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
