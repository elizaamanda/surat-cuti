<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Cuti;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total pegawai dan cuti
        $jumlahPegawai = Pegawai::count();
        $jumlahCuti    = Cuti::count();

        // Ambil 5 cuti terbaru
        $latestCuti = Cuti::latest()->take(5)->get();

        return view('dashboard', compact('jumlahPegawai', 'jumlahCuti', 'latestCuti'));
    }
}
