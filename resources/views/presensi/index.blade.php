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
                                    {{-- <form id="tarik-data-form" method="POST" action="{{ url('fingerprint/tarik') }}"> --}}
                                        @csrf
                                        <button type="submit" id="tarik-data-btn">Tarik Data Masuk</button>
                                        <div class="loader" style="display:none">loading</div>
                                    {{-- </form> --}}
                                </div>
                                <div class="table-responsive">
                                    <table id="tablesiswa" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Nama Siswa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($absensis as $absensi)
                                            <tr>
                                                <td>{{ $absensi->id_user }}</td>
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
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a span="{{ url('fingerprint/delete/'.$absensi->id) }}" class="btn btn-danger btn-sm delete" data-id="{{ $absensi->id }}">Delete</a>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
    // $(document).ready(function() {
    //     $("#tarik-data-form").submit(function(event) {
    //         event.preventDefault();
    //         $("#tarik-data-btn").attr("disabled", true);
    //         $(".loader").show();

    //         var form = $(this);
    //         setTimeout(function() {
    //             form.unbind('submit').submit();
    //         }, 1000);
    //     });
    // });
    $("#tarik-data-btn").click(function(e) {
    e.preventDefault();
    var data = $("input[name='_token']").val();
    $.ajax({
        type: 'POST',
        url: "{{ url('fingerprint/tarik') }}",
        data: { _token: data },
        beforeSend: function() {
            $("#tarik-data-btn").attr("disabled", true);
            // Menambahkan animasi loading
            $("<div class='loading-overlay'>Loading...</div>").appendTo("body");
        },
        complete: function(data) {
            $("#tarik-data-btn").attr("disabled", false);
            // Menghapus animasi loading
            $(".loading-overlay").remove();
        }
    });
});




        $('.delete').click(function() {
            var fingerid = $(this).attr('data-id');
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus data siswa dengan NIM " + fingerid + " ? ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "fingerprint/delete/" + fingerid;
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
        toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
</div>
@endsection
