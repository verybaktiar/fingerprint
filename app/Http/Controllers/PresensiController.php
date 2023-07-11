<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        // Alamat IP dan port mesin fingerprint solution x100c
        $url = 'http://119.235.252.10:80';

        // Mengambil data presensi dari mesin fingerprint solution x100c
        $data = file_get_contents($url);

        // Parsing data presensi ke dalam format yang sesuai
        $presensi = json_decode($data, true);

        // Menampilkan data presensi ke dalam view
        return view('presensi', compact('presensi'));
    }
}
