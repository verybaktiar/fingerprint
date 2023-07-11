<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Perizinan;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Services\HolidayAPI;

class RekapSiswaController extends Controller
{
    public function index(Request $request)
    {
        $absensis = Absensi::all();
        $siswaList = Siswa::all();
        $holidayAPI = new HolidayAPI();
        $year = 2023;
        $holidays = $holidayAPI->getHolidays($year);
        $dateRange = $this->generateDateRange($request->input('start_date'), $request->input('end_date'));

        return view('rekapsiswa.index', compact('absensis', 'siswaList', 'dateRange', 'holidays'));
    }

    public function export(Request $request)
    {
        $siswaId = $request->input('siswa');
        $siswa = Siswa::findOrFail($siswaId);

        $absensis = Absensi::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama', $siswa->nama);
        })->get();

        $holidayAPI = new HolidayAPI();
        $year = 2023;
        $holidays = $holidayAPI->getHolidays($year);

        $dateRange = $this->generateDateRange($request->input('start_date'), $request->input('end_date'));

        return view('rekapsiswa.pdf', compact('absensis', 'siswa', 'dateRange', 'holidays'));
    }

    public function getData(Request $request)
    {
        $siswaId = $request->input('siswa');
        $siswa = Siswa::findOrFail($siswaId);

        $absensis = Absensi::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama', $siswa->nama);
        })->get();

        $holidayAPI = new HolidayAPI();
        $year = 2023;
        $holidays = $holidayAPI->getHolidays($year);

        $dateRange = $this->generateDateRange($request->input('start_date'), $request->input('end_date'));

        $data = [];

        foreach ($dateRange as $date) {
            $absensiData = [];

            $absensiData['absensiId'] = null;
            $absensiData['tanggal'] = $date;
            $absensiData['hari'] = \Carbon\Carbon::parse($date)->locale('id')->isoFormat('dddd');
            $absensiData['jamMasuk'] = '-';
            $absensiData['jamPulang'] = '-';
            $absensiData['keterlambatan'] = '-';
            $absensiData['status'] = '-';
            $absensiData['keterangan'] = '-';

            $absensi = $absensis->where('tanggal', $date)->first();
            $isHoliday = false;
            $holidayName = '';

            foreach ($holidays as $holiday) {
                if ($holiday['date'] == $date) {
                    $isHoliday = true;
                    $holidayName = $holiday['name'];
                    break;
                }
            }

            if ($absensi) {
                $absensiData['absensiId'] = $absensi->id;
                $absensiData['jamMasuk'] = date('H:i', strtotime($absensi->waktu));

                $jamPulang = date('H:i', strtotime($absensi->waktu . ' +8 hours'));
                if ($jamPulang < '06:00') {
                    $jamPulang = date('H:i', strtotime($jamPulang . ' +24 hours'));
                }
                $absensiData['jamPulang'] = $jamPulang;

                if ($absensi->status === 'Terlambat') {
                    $jamMasuk = strtotime('07:00');
                    $jamAbsensi = strtotime($absensi->waktu);
                    $keterlambatan = max(0, ($jamAbsensi - $jamMasuk) / 60);
                    $absensiData['keterlambatan'] = $keterlambatan;
                }

                $absensiData['status'] = $absensi->status;
            }

            if ($isHoliday) {
                $absensiData['keterangan'] = $holidayName;
            }

            $data[] = $absensiData;
        }

        return response()->json($data);
    }

    public function updateStatus(Request $request)
    {
        $siswaId = $request->input('siswaId');
        $status = $request->input('status');

        $absensi = Absensi::where('siswa_id', $siswaId)->first(); // Menggunakan kolom 'siswa_id' sebagai kriteria pencarian
        if ($absensi) {
            $absensi->status = $status;
            $absensi->save();
        }

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }

    private function generateDateRange($startDate, $endDate)
    {
        $dates = [];
        $currentDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        while ($currentDate <= $endDate) {
            $dates[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('+1 day', $currentDate);
        }

        return $dates;
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        // Simpan data rekap presensi ke tabel "perizinan"
        $perizinan = new Perizinan();
        $perizinan->siswa_id = $request->input('nama');
        $perizinan->tanggal = $request->input('tanggal');
        $perizinan->status = $request->input('status');
        $perizinan->save();

        // Redirect ke halaman sukses atau tampilan lainnya
        return redirect()->route('rekap.presensi')->with('success', 'Data presensi berhasil disimpan.');
    }

}
