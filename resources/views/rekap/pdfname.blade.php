<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Presensi Mahasiswa</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}
        .footer {
            text-align: right;
            margin-top: 50px;
            display: flex;
            justify-content: flex-start;
        }
        .footer span {
            display: block;
        }
         /* CSS untuk tabel */
         table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        body{font-family: Arial;background-color:#fff;}
        .kopsurat{width: 650px;margin: 0 auto;background-color: #fff;height: 500px;padding: 20px:}
        .tengah {text-align: center;libe-height: 7px;}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td><img src="data:image/jpeg;base64,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j4dW6adS6RqXVyuL7X57wM6+f00pGo1OqPw09I1vvY6FvvbmfaBJjM7o0mRWJ+s1aSNNvLz3v7wJcTmS06BrOrqotdSLMLtbkTAwpZvSYO24ppp+sNgjX28rXsbHY+8DVPEdL6OK/h1bH/d6RrHm07rq+fwj7jbw+a0aj1FU/ZaNTXXSdY2sb/KJPu1TxDSGGbEFKgC21UiF8RbtpF0vtfnz5R5eN7CY5KpOg6gttxYg37EH2jl74T16oVSx3t2nn3PafZXYTPqNTwwAy+Lr06tI9PO+899zwhPEtLTSK0qz+Nr0hVBI0c7jVAlTPqTKjIrv4mqyqAx8p3uAYENXiaggXWHUm91OkMluWsavLfmO8HHv7JcXxBRp+LcO3g6NWkKb6+Wnff3j7SD5/TAS6VB4mrSNI+7z6x/B7SnoZpTZ6iWZDT06iwAHmFxveJ8nHHs9ynNKeJXUgZSOauAGG5tcAm17Xj7DfgBEj2AgU+cZS+IrUHD6Fp+LqIJVvMoA07e28CSrllmo+HpVKfiXHL1DpYd4HuZYKo9WlUpldVLxNmvY6wB0+cDUOTVC+IclNVbwbWJsNAsb7QM8XkfjNTNR2UU9enQbX1c73HtAranC1WotFKtQaaXiXZWOo69xYlfYQLXF4LEV8GadU0vGa19OrRs9xa+/ID5wNJshr6Gw2pPoptY3bxBvqPTT6/blAzTIHQuEYMjadIck2tz5DvA1F4XrIMQlOp9XV8HSSzaxo3NyFsN/4QNjGcNMKVdaNQlq3hfasSBoPst+/wDCBvZPlJw9SsQ16b+HoW/p0g6trWFyekCdcvKqwFR3LW+0a9rHptArcNw8fAFOowDi9nQ2Zbtc6WI2vyMCPAZJiaQwxvS1UfG1bvY6+VtoGWW5FWoeCVKEp4mu5Y+q+nRt773gYVOGmesKtTQxf7Vea7LZNAK/43gRf/mawSuoqK3ieHpZmYnym51HTAssVlTvTVPICt7NvqFzc6Tba8DQpZBitNYPUUmp4fmDPfy+5ECxyvJzhqrsjakqadWo3I0g202AHMwLiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB//2Q==" width="90" height="90"></td>
				<td>
				<center>
					<font size="4">GRAHA PENA SURABAYA</font><br>
					<font size="5"><b>PT OTAK KANAN</b></font><br>
					<font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br>
					<font size="2"><i>Graha Pena suite 1503 Jl. Ahmad Yani 88 Surabaya Jawa Timur – Indonesia</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2">
                    <hr>
                    <center>
                      <font size="4" face="Arial" style="font-weight: bold;">Laporan Rekap Presensi Mahasiswa</font>
                    </center>
                  </td>
			</tr>

		</table>

        <table id="tablesiswa">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Keterlambatan (Menit)</th>
                    <th>Status</th>
                    <th>Nama Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $absensi)
                    @if ($siswa && $absensi->siswa && $absensi->siswa->nama === $siswa->nama)
                        <tr>
                            <td>{{ $absensi->id }}</td>
                            <td>{{ $absensi->tanggal }}</td>
                            <td>{{ date('H:i', strtotime($absensi->waktu)) }}</td>
                            <td>
                                @php
                                $jamPulang = date('H:i', strtotime($absensi->waktu . ' +8 hours'));
                                if ($jamPulang < '06:00') {
                                    $jamPulang = date('H:i', strtotime($jamPulang . ' +24 hours'));
                                }
                                @endphp
                                {{ $jamPulang }}
                            </td>
                            <td>
                                @if ($absensi->status === 'Terlambat')
                                    @php
                                    $jamMasuk = strtotime('07:00');
                                    $jamAbsensi = strtotime($absensi->waktu);
                                    $keterlambatan = max(0, ($jamAbsensi - $jamMasuk) / 60);
                                    echo $keterlambatan;
                                    @endphp
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $absensi->status }}</td>
                            <td>
                                @if ($absensi->siswa)
                                    {{ $absensi->siswa->nama }}
                                @else
                                    Nama Siswa Tidak Ditemukan
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>

        <div class="footer">
            <span>Surabaya, {{ date('d F Y') }}</span>
            <span style="margin-top: 20px;"></span>
            <span style="margin-top: 20px;"></span>
            <span style="margin-top: 20px;"></span>
            <span>(................................)</span>
        </div>
		<br>

	</center>

</body>
</html>
