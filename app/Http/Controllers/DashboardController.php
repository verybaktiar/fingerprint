<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\userfinger;
use App\Models\Absensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totaluserfinger = userfinger::count();
        $totalAbsensi = Absensi::count();


        return view('dashboard.index', compact('totalSiswa', 'totaluserfinger', 'totalAbsensi'));
    }

}
