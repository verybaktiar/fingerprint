<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    public function index()
    {
        $siswaList = Siswa::all();

        return view('perizinan.index', compact('siswaList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_baru' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        $siswa = Siswa::findOrFail($request->input('nama'));

        $absensi = new Absensi();
        $absensi->id = $siswa->id;
        $absensi->id_baru = $request->input('id_baru');
        $absensi->tanggal = $request->input('tanggal');
        $absensi->status = $request->input('status');
        $absensi->save();

        return redirect()->route('perizinan.index')->with('success', 'Data berhasil disimpan.');
    }
}
