{{-- <html>
<head>
<body>
<hr><width="100" height="75"></hr>
<h1><center><font size="5" face="arial">PT OTAK KANAN</font></center></h1>
<center><b><font size="4" face="Courier New">PT OTAK KANAN Group</font></b></center><br>
<center><b>Graha Pena suite 1503
Jl. Ahmad Yani 88 Surabaya
Jawa Timur – Indonesia<b></center><br>
<hr><width="100" height="75"></hr>
<div class="table-responsive">
    <table id="tablesiswa" class="display expandable-table" style="width:100%">
      <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Lengkap</th>
          <th>Asal Kampus/Sekolah</th>
          <th>Asal Jurusan</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
        </tr>
      </thead>
       <tbody>
            @foreach ($data as $siswa )
                <tr>
                    <td>{{ $siswa->nim }}</a></td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->univ }}</td>
                    <td>{{ $siswa->jurusan }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->alamat }}</td>

                </tr>

            @endforeach
        </tbody>
    </table> --}}
    {{-- {{ $siswa->links()  }} --}}
  {{-- </div>

</body>
</html> --}}
{{-- <!DOCTYPE html>
<html>
<head>
	<title>contoh surat pengunguman</title>
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

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td><img src="LOGO.jpg" width="90" height="90"></td>
				<td>
				<center>
					<font size="4">PT OTAK KANAN </font><br>
					<font size="5"><b>PT OTAK KANAN Group</b></font><br>
					<font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br>
					<font size="2"><i>Graha Pena suite 1503
                        Jl. Ahmad Yani 88 Surabaya
                        Jawa Timur – Indonesia</i></font>
				</center>
				</td>
			</tr>
        <div class="table-responsive">
            <table id="tablesiswa" class="display expandable-table" style="width:100%">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama Lengkap</th>
                  <th>Asal Kampus/Sekolah</th>
                  <th>Asal Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                </tr>
              </thead>
               <tbody>
                    @foreach ($data as $siswa )
                        <tr>
                            <td>{{ $siswa->nim }}</a></td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->univ }}</td>
                            <td>{{ $siswa->jurusan }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>{{ $siswa->alamat }}</td>

                        </tr>

                    @endforeach
                </tbody>
            </table>  --}}
          {{-- </div>
		{{-- </table>
		<table>
			<tr class="text2">
				<td>Nomer</td>
				<td width="572">: -</td>
			</tr>
			<tr>
				<td>Perihal</td>
				<td width="564">: -</td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Kpd yth.<br>Siswa Smk Baitul Hikmah kelas x<br>Di tempat</font>
		       </td>
		    </tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Assalamu'alaikum wr.wb<br>Dalam rangka praktikum simulasi digital yg jatuh pada tanggal 16 mei 2019
Siswa smk baitul hikmah <b>kelas X</b> akan mengadakan peraktikum, jadi di harapkan siswa di minta hadir
pada tempat yang sudah di siapkan.</font>
		       </td>
		    </tr>
		</table>
		<br>
		</table>
		<table>
			<tr class="text2">
				<td>Hari Tanggal</td>
				<td width="541">: <b>Selasa/16 mei 2019</b></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td width="525">: 08:30</td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td width="525">: Ruang lap komputer</td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Diharapkan atas kehadiranya, Demikian surat ini di sampaikan, atas perhatian dan kerjasamanya kami
ucapkan terima kasih.<br><br>Wassalamu'alaikum wr.wb.
</font>
		       </td>
		    </tr>
		</table>
		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Wali kelas<br><br><br><br>Bpk Fauzy.s.kom</td>
			</tr>
	     </table> --}}
	{{-- </center>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Data Siswa</title>
	<style type="text/css">
	body{font-family: Arial;background-color:#fff;}
    .kopsurat{width: 750px;margin: 0 auto;background-color: #fff;height: 500px;padding: 20px:}
    table {border-bottom: 7px solid #000;padding: 3px;width: 100%;}
    .tengah {text-align: center;libe-height: 7px;}


	</style>
</head>
<body>
	<div class="kopsurat">
		<table>
			<tr>
				<td>
					<td class="tengah">
						<h2>PT OTAK KANAN</h2>
						<h2>PT OTAK KANAN Group</h2>
						<h2>Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</h2>
						<h2>Graha Pena suite 1503 Jl. Ahmad Yani 88 Surabaya Jawa Timur – Indonesia</h2>
					</td>
			</tr>
		</table>
	</div>
</body>
</html>
