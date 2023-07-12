@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Rekap Presensi Per Siswa</p>
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-12">
                                    <form id="filterForm" action="{{ url('/rekapsiswa/export') }}" method="get" class="input-group">
                                        @csrf
                                        <div class="input-group-prepend">
                                            <label for="start_date" class="input-group-text">Start Date</label>
                                        </div>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="#">
                                        <div class="input-group-prepend">
                                            <label for="end_date" class="input-group-text">End Date</label>
                                        </div>
                                        <input type="date" class="form-control " id="end_date" name="end_date" value="#">
                                        <select class="form-control" id="siswa" name="siswa">
                                            <option value="">-- Pilih Siswa --</option>
                                            @foreach ($siswaList as $siswa)
                                            <option value="{{ $siswa->nim }}">{{ $siswa->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit">Filter</button>
                                        </div>
                                    </form>
                                    <button id="showDataBtn" class="btn btn-outline-primary mt-3" type="button">Tampilkan Data</button>
                                </div>
                                <div id="dataContainer" class="row mt-3">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table">
                                            <thead>
                                                <tr>
                                               
                                                    <th>Tanggal</th>
                                                    <th>Hari</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Keterlambatan (menit)</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
        <div id="dataContainer" class="row mt-3"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#showDataBtn').click(function () {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var siswa = $('#siswa').val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: '/rekapsiswa/getData',
                type: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    siswa: siswa
                },
                success: function (response) {
                    var dataTable = $('#dataTable tbody');
                    dataTable.empty();

                    for (var i = 0; i < response.length; i++) {
                        var rowData = response[i];

                        var tableRow =
                            '<tr>' +

                            '<td>' + rowData.tanggal + '</td>' +
                            '<td>' + rowData.hari + '</td>' +
                            '<td>' + rowData.jamMasuk + '</td>' +
                            '<td>' + rowData.jamPulang + '</td>' +
                            '<td>' + rowData.keterlambatan + '</td>';

                        if (rowData.status === '-' && rowData.hari !== 'Sabtu' && rowData.hari !== 'Minggu') {
                            tableRow +=
                                '<td>' +
                                '<select class="status-dropdown-'+ rowData.tanggal +'">' +
                                '<option value="">Pilih Status</option>' +
                                '<option value="Sakit">Sakit</option>' +
                                '<option value="Izin">Izin</option>' +
                                '</select>' +
                                '</td>';
                        } else {
                            tableRow += '<td>' + rowData.status + '</td>';
                        }

                        tableRow += '<td>' + rowData.keterangan + '</td>' +
                            '<td><button class="saveBtn-'+ rowData.tanggal +'" attr-nim="' + rowData.id_user + '" attr-tanggal="'+ rowData.tanggal +'">Save</button></td>' +
                            '</tr>';

                        dataTable.append(tableRow);
                    }

                    $('#dataTable').addClass('table-responsive');

                    $('[class*=saveBtn-]').on('click', function () {
                        var siswaNim = $('#siswa').val();
                        var getTanggal = $(this).attr('attr-tanggal');
                        var statusIzin = $('.status-dropdown-'+getTanggal).val();

                        console.log(siswaNim);
                        console.log(getTanggal);
                        console.log(statusIzin);

                        $.ajax({
                            url: '/rekapsiswa/updateStatus',
                            type: 'POST',
                            data: {
                                _token : '{{csrf_token()}}',
                                siswaNim: siswaNim,
                                tanggal: getTanggal,
                                statusIzin: statusIzin
                            },
                            success: function (response) {
                                alert(response.message);
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });
                    });

                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection
