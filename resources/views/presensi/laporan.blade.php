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
                                    {{-- <form method="POST" action="fingerprint/tarik">
                                        @csrf
                                        <button type="submit">Tarik Data Masuk</button>
                                    </form> --}}
                                    <a href="{{ url('presensi.pdf') }}" class="btn btn-primary">Export PDF</a>
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
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        {{-- <a href="{{ url('siswa/edit/'.$siswa->nim) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                                                        <a span="{{ url('fingerprint/delete/'.$absensi->id) }}"
                                                            class="btn btn-danger btn-sm delete"
                                                            data-id="{{ $absensi->id }}">Delete</a>
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
@endsection
