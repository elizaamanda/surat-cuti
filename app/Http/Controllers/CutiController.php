<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $cuti = Cuti::latest()->get();
            return view('cuti.admin_index', compact('cuti'));
        } else {
            $cuti = Cuti::where('nama', $user->nama)->latest()->get();
            return view('cuti.pegawai_index', compact('cuti'));
        }
    }

    public function create()
    {
        return view('cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_cuti' => 'required',
            'alasan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Cuti::create([
            'nama' => Auth::user()->nama,
            'jenis_cuti' => $request->jenis_cuti,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dikirim!');
    }

    public function setuju($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->update(['status' => 'Disetujui']);
        return redirect()->route('cuti.index')->with('success', 'Cuti telah disetujui.');
    }

    public function tolak($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->update(['status' => 'Ditolak']);
        return redirect()->route('cuti.index')->with('error', 'Cuti telah ditolak.');
    }

   public function print($id)
{
    // Ambil data cuti + relasi ke tabel pegawai
    $cuti = Cuti::with('pegawai')->findOrFail($id);

    // Jika kolom NIP di tabel cuti kosong, ambil dari tabel pegawai
    if (empty($cuti->nip) && $cuti->pegawai) {
        $cuti->nip = $cuti->pegawai->nip;
    }

    // Jika kolom nama juga kosong, ambil dari pegawai
    if (empty($cuti->nama) && $cuti->pegawai) {
        $cuti->nama = $cuti->pegawai->nama;
    }

    return view('cuti.print', compact('cuti'));
}

    public function rekap()
    {
        $rekap = DB::table('cuti')
            ->select('nama', DB::raw('SUM(DATEDIFF(tanggal_kembali, tanggal_mulai) + 1) as total_cuti'))
            ->groupBy('nama')
            ->get();

        $jenisCuti = DB::table('cuti')
            ->select('jenis_cuti', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_cuti')
            ->pluck('total', 'jenis_cuti')
            ->toArray();

        $bulan = DB::table('cuti')
            ->select(DB::raw('MONTH(tanggal_mulai) as bulan'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(tanggal_mulai)'))
            ->pluck('total', 'bulan')
            ->toArray();

        return view('cuti.rekap', compact('rekap', 'jenisCuti', 'bulan'));
    }

    // 🔧 FIXED: pakai nama user, bukan user_id
    public function edit($id)
    {
        $cuti = Cuti::where('nama', Auth::user()->nama)->findOrFail($id);
        return view('cuti.edit', compact('cuti'));
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::where('nama', Auth::user()->nama)->findOrFail($id);

        if ($cuti->status !== 'Menunggu') {
            return redirect()->route('cuti.index')->with('error', 'Cuti yang sudah diproses tidak bisa diubah.');
        }

        $request->validate([
            'jenis_cuti' => 'required',
            'alasan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $cuti->update([
            'jenis_cuti' => $request->jenis_cuti,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil diperbarui!');
    }

    public function destroy($id)
{
    $query = Cuti::query();

    // Kalau user adalah pegawai, batasi penghapusan ke nama sendiri
    if (Auth::user()->role === 'pegawai') {
        $query->where('nama', Auth::user()->nama);
        // Pegawai hanya bisa hapus jika status masih menunggu
        $query->where('status', 'Menunggu');
    }

    $cuti = $query->findOrFail($id);

    // Kalau admin, lewati pengecekan status
    if (Auth::user()->role !== 'admin' && $cuti->status !== 'Menunggu') {
        return redirect()->route('cuti.index')->with('error', 'Cuti yang sudah diproses tidak bisa dihapus.');
    }

    $cuti->delete();
    return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dihapus.');
}


}
