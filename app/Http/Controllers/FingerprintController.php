<?php

namespace App\Http\Controllers;
use PDF;
use Carbon\Carbon;
use App\Models\User;
// use zklib\Fingerprint;
use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Support\Str;
use Rats\Zkteco\Lib\ZKTeco;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FingerprintController extends Controller
{

    public function index()
    {
        // $result = Http::get('http://localhost/absensi/finger.php');

        // $data = $result->json();

        // foreach ($data as $item) {
        //     Absensi::updateOrCreate(
        //         ['id' => $item['id']],
        //         [
        //             'tanggal' => $item['tanggal'],
        //             'waktu' => $item['waktu'],
        //             'status' => $item['status'],
        //         ]
        //     );
        // }

        $absensis = Absensi::all();

        return view('presensi.index', compact('absensis'));
    }
    public function filter(Request $request)
        {
            $tanggal = $request->input('tanggal');

            // Mengambil data absensi berdasarkan tanggal yang dipilih
            $absensis = Absensi::where('tanggal', $tanggal)->get();

            return view('presensi.index', compact('absensis'));
        }

        public function tarik(Request $request)
        {
            // Mendapatkan data dari API atau sumber data lainnya
            $response = Http::get('http://localhost/absensi/waktu.php');
            $data = $response->json();

            // Menyimpan data ke dalam database
            foreach ($data as $item) {
                $waktu = Carbon::parse($item['waktu'])->format('Y-m-d H:i:s');

                Absensi::updateOrCreate(
                    ['id_user' => $item['id_user']],
                    [
                        'id' => Uuid::uuid4()->toString(),
                        'tanggal' => $item['tanggal'],
                        'waktu' => $waktu,
                        'status' => $item['status'],
                    ]
                );
            }

            // Redirect ke halaman view
            return redirect('fingerprint')->with('success', 'Data berhasil ditarik dan disimpan!');
        }
    public function delete($id)
    {
        Absensi::findOrFail($id)->delete();

        return redirect('fingerprint')->with('success', 'Data berhasil dihapus!');
    }

}
