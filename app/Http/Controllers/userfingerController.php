<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\userfinger;
use Illuminate\Http\Request;

class userfingerController extends Controller
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

        $userfinger = Userfinger::all();
        return view('userfinger.index', compact('userfinger'));
    }
    public function tarik(Request $request)
    {
            // Mendapatkan data dari API atau sumber data lainnya
            $response = Http::get('http://localhost/absensi/user.php');
            $data = $response->json();

            // Menyimpan data ke dalam database
            foreach ($data as $item) {
                userfinger::updateOrCreate(
                    ['id' => $item['id']],
                    [
                        'name' => $item['name'],
                    ]
                );
            }

            // Redirect ke halaman view
            return redirect('userfinger')->with('success', 'Data berhasil ditarik dan disimpan!');
    }
    public function delete($id)
    {
        userfinger::findOrFail($id)->delete();

        return redirect('userfinger')->with('success', 'Data berhasil dihapus!');
    } //
}
