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
            @foreach ($siswa as $siswa )
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
    </table>
    {{-- {{ $siswa->links()  }} --}}
  </div>
