@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Data User Presensi</p>
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" action="{{ url('userfinger/tarik') }}">
                                        @csrf
                                        <button type="submit">Tarik Data User</button>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table id="tablesiswa" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama User</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userfinger as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>

                                                <td>
                                                    @if ($user->siswa)
                                                        {{ $user->siswa->nama }}
                                                    @else
                                                        Nama Siswa Tidak Ditemukan
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.delete').click(function(){
        var userfinger = $(this).attr('data-id');
        swal({
            title: "Yakin?",
            text: "Kamu akan menghapus data user dengan ID "+userfinger+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "{{ url('userfinger/delete') }}/"+userfinger;
                swal("Data Berhasil Dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Data Tidak Jadi Dihapus!");
            }
        });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
@endsection
