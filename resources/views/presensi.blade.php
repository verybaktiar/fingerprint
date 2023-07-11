<html>
<head>
    <title>Data Presensi</title>
</head>
<body>
    <h1>Data Presensi</h1>

    <table>
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presensi as $data)
            <tr>
                <td>{{ $data['nip'] }}</td>
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['waktu_masuk'] }}</td>
                <td>{{ $data['waktu_keluar'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
