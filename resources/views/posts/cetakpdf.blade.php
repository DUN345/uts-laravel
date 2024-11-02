<!-- <!DOCTYPE html>
<html>
<head>
    <title>Posts PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Posts</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Foto Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $post->nim }}</td>
                    <td>{{ $post->nama_mahasiswa }}</td>
                    <td><img src="{{ Storage::url('posts/' . $post->foto_mahasiswa) }}" width="50" /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> -->