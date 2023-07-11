<!DOCTYPE html>
<html>

<head>
    <title>Laporan Presensi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan Presensi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Nama Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absensi)
            <tr>
                <td>{{ $absensi->id }}</td>
                <td>{{ $absensi->tanggal }}</td>
                <td>{{ $absensi->waktu }}</td>
                <td>{{ $absensi->status }}</td>
                <td>
                    @if ($absensi->siswa)
                    {{ $absensi->siswa->nama }}
                    @else
                    Nama Siswa Tidak Ditemukan
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
