<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Exports\SiswaExport;
use App\Imports\siswaImport;
use PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $siswa = Siswa::where('nama','LIKE','%'.$request->search.'%')->get();
        }else{
            $siswa = Siswa::all();
        }
         return view('siswa.index',['siswa'=>$siswa]);
    }
     public function create(Request $request)
    {
        return view('siswa.tambah');
    }
     public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('univ', $request->univ);
        Session::flash('jurusan', $request->jenis_kelamin);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('alamat', $request->alamat);



        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'univ' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',

        ], [
            'nim.required' => 'kodepegawai wajib diisi',
            'nama.required' => 'nama wajib diisi',
            'univ.required' => 'univ wajib diisi',
            'jurusan.required' => 'jurusan wajib diisi',
            'jenis_kelamin.required' => 'jenis_kelamin wajib diisi',
            'alamat.required' => 'alamat wajib diisi',

        ]);
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'univ' => $request->univ,
            'jurusan' => $request->jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Berhasil menambahkan data');
    }
    public function edit($nim)
    {
        $siswa =DB::table('siswa')->where('nim',$nim)->first();
        return view('siswa/edit', compact('siswa'));
    }

    public function editProcess(Request $request, $nim)
    {
        DB::table('siswa')->where('nim', $nim)
            ->update([
                "nim"=>$request->nim,
                 "nama"=>$request->nama,
                    "univ"=>$request->univ,
                    "jurusan"=>$request->jurusan,
                    "jenis_kelamin"=>$request->jenis_kelamin,
                    "alamat"=>$request->alamat,

            ]);
            return redirect('siswa')->with('Success', 'Data Berhasil Diupdate!');
    }
   public function delete($nim)
    {

        DB::table('siswa')->where('nim', $nim)->delete();
        return redirect('siswa')->with('Success', 'Data Berhasil Dihapus!');
    }
    public function exportexcel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
    public function importexcel(Request $request)

    {

            $data = $request->file('file');
            $namafile = $data->getClientOriginalName();
            $data->move('siswaImport', $namafile);
            Excel::import(new siswaImport, public_path('/siswaImport/' . $namafile));
            return redirect()->back()->with('success', 'Data Berhasil Diimport!');


    }
    public function exportpdf()
    {
        $data = Siswa::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('siswa.exportpdf');
        return $pdf->download('datasiswa.pdf');
    }

}
