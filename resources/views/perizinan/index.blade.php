@extends('layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1>Input Data Perizinan</h1>

                            <form action="{{ url('perizinan.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <select id="nama" name="nama" class="form-control">
                                        <option value="">-- Pilih Nama --</option>
                                        @foreach ($siswaList as $siswa)
                                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_baru">ID Baru:</label>
                                    <input type="text" id="id_baru" name="id_baru" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="izin">Izin</option>
                                        <option value="sakit">Sakit</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
