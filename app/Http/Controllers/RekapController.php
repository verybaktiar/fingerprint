<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Siswa;
use App\Models\Absensi;

use Illuminate\Http\Request;
use App\Models\DataRekapPresensi;
use Illuminate\Support\Facades\View;

class RekapController extends Controller
{
    public function index()
    {
        $absensis = Absensi::all();
        $siswaList = Siswa::all();

        return view('rekap.index', compact('absensis','siswaList'));
    }

    public function exportPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $absensis = Absensi::query()
            ->whereBetween('tanggal', [$start_date, $end_date])
            ->get();

        $dompdf = new Dompdf();
        $html = View::make('rekap.pdf', compact('absensis'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('rekap.pdf', ['Attachment' => false]);
    }
    public function exportPdfByName(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $siswaId = $request->input('siswa');
        $siswa = Siswa::findOrFail($siswaId);

        $absensis = Absensi::whereHas('siswa', function ($query) use ($siswaId) {
            $query->where('id', $siswaId);
        })->get();

        $dompdf = new Dompdf();
        $html = View::make('rekap.pdfname', compact('absensis','siswaList'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('rekap.pdf', ['Attachment' => false]);

    }
    public function saveData(Request $request)
    {
        // Validasi data yang diterima dari frontend
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'keterlambatan' => 'required',
            'status' => 'required',
        ]);

        // Ambil data dari permintaan
        $nama = $request->input('nama');
        $tanggal = $request->input('tanggal');
        $hari = $request->input('hari');
        $jamMasuk = $request->input('jam_masuk');
        $jamPulang = $request->input('jam_pulang');
        $keterlambatan = $request->input('keterlambatan');
        $status = $request->input('status');

        // Simpan data ke tabel baru
        $data = new DataRekapPresensi;
        $data->nama = $nama;
        $data->tanggal = $tanggal;
        $data->hari = $hari;
        $data->jam_masuk = $jamMasuk;
        $data->jam_pulang = $jamPulang;
        $data->keterlambatan = $keterlambatan;
        $data->status = $status;
        $data->save();

        // Berikan respons yang sesuai ke frontend
        return redirect()->route('rekapsiswa.index')->with('success', 'Data berhasil disimpan');
    }
}
