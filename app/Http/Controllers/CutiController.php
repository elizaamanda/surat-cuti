<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::all();
        return view('cuti.index', compact('cuti'));
    }

    public function create()
    {
        return view('cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_cuti' => 'required|string|max:255',
            'alasan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Simpan data cuti
        Cuti::create([
            'nama' => $request->nama,
            'jenis_cuti' => $request->jenis_cuti,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.edit', compact('cuti'));
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_cuti' => 'required|string|max:255',
            'alasan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $cuti->update([
            'nama' => $request->nama,
            'jenis_cuti' => $request->jenis_cuti,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diperbarui!');
    }

    public function rekap()
    {
        // Rekap cuti per pegawai (total hari cuti diambil)
        $rekap = DB::table('cuti')
            ->select('nama', DB::raw('SUM(DATEDIFF(tanggal_kembali, tanggal_mulai) + 1) as total_cuti'))
            ->groupBy('nama')
            ->get();

        // Rekap jenis cuti
        $jenisCuti = DB::table('cuti')
            ->select('jenis_cuti', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_cuti')
            ->pluck('total', 'jenis_cuti')
            ->toArray();

        // Rekap cuti per bulan
        $bulan = DB::table('cuti')
            ->select(DB::raw('MONTH(tanggal_mulai) as bulan'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(tanggal_mulai)'))
            ->pluck('total', 'bulan')
            ->toArray();

        return view('cuti.rekap', compact('rekap', 'jenisCuti', 'bulan'));
    }


    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil dihapus!');
    }
}
