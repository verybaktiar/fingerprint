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
                                    <form action="{{ url('/rekap/export-pdf') }}" method="GET">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Export PDF</button>
                                    </form>
                                    <form action="{{ url('/rekap/exportPdfByName') }}" method="GET">
                                        <div class="form-group">
                                            <label for="siswa">Pilih Siswa</label>
                                            <select class="form-control" id="siswa" name="siswa">
                                                <option value="">-- Pilih Siswa --</option>
                                                @foreach ($siswaList as $siswa)
                                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Export PDF by Name</button>
                                    </form>

                                </div>

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
