@extends('layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Absensi</h4>
                            <form id="editForm" action="{{ url('rekapsiswa.update', $absensi->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $absensi->tanggal }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jam_masuk">Jam Masuk</label>
                                    <input type="text" class="form-control" id="jam_masuk" name="jam_masuk" value="{{ $absensi->jamMasuk }}">
                                </div>
                                <div class="form-group">
                                    <label for="jam_pulang">Jam Pulang</label>
                                    <input type="text" class="form-control" id="jam_pulang" name="jam_pulang" value="{{ $absensi->jamPulang }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="Hadir" {{ $absensi->status === 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Sakit" {{ $absensi->status === 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                        <option value="Izin" {{ $absensi->status === 'Izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="Alpha" {{ $absensi->status === 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('rekapsiswa.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
