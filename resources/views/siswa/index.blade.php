@extends('layouts.master')
@section('content')
 <!-- Modal -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Data Siswa</p>
                   <div class="col-auto">
                    <a href="/siswa/exportexcel" class="btn btn-primary my-3" target="_blank">EXPORT EXCEL</a>
                    <a href="/siswa/importexcel" class="btn btn-secondary my-3" data-toggle="modal" data-target="#exampleModal">Import EXCEL</a>
                    <a href="siswa/exportpdf" class="btn btn-info my-3" target="_blank">EXPORT PDF</a>
                  <div class="row">
                    <div class="col-12">
                    <a href="/siswa/create" class="bi bi-plus blue-color float-right"></a>
                      </div>
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
                              <th>Aksi</th>
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
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('siswa/edit/'.$siswa->nim) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <a span="{{ url('siswa/delete/'.$siswa->nim) }}" class="btn btn-danger btn-sm delete"data-id="{{ $siswa->nim }}">Delete</a>
                                            </div>

                                           {{-- <form action="{{ url('siswa/'.$siswa->nim) }}" method="post"  class="btn btn-danger delete btn-sm" data-id="{{ $siswa->nim }}">
                                                @method('delete')
                                                @csrf
                                                {{-- <button class="btn btn-danger delete btn-sm" data-id="{{ $siswa->nim }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                             </form> --}}
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $siswa->links()  }} --}}
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="siswa/importexcel" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>
    </div>
    </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.delete').click(function(){
                var siswaid = $(this).attr('data-id');
                    swal({
                        title: "Yakin?",
                        text: "Kamu akan menhapus data siswa dengan NIM "+siswaid+" ? ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            window.location = "siswa/delete/"+siswaid,
                            swal("Data Berhasil Di Hapus!", {
                            icon: "success",
                            });
                        } else {
                            swal("DATA TIDAK JADI DI HAPUS!");
                        }
                    });
            });
        </script>
        <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
        </script>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div
@endsection


