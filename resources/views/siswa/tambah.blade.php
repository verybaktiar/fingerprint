@extends('layouts.master')
@section('content')

 <!-- Modal -->
     <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
      </ol>
    </div>

    <div class="card mb-4">
      <form action="/siswa/store" method="POST">
        @csrf
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Siswa</h6>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="nima" autofocus required>
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" autofocus required>
          </div>
          <div class="form-group">
            <label for="univ">UNIV</label>
            <input type="text" class="form-control" name="univ" id="univ" placeholder="univ" autofocus required>
          </div>
          <div class="form-group">
            <label for="univ">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="jurusan" autofocus required>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <div class="col-xs-10">
                <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected>Jenis Kelamin</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
          </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" autofocus required>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </form>
    </div>
    <!--Row-->

@endsection


