<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    // ✅ Menampilkan daftar pegawai
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    // ✅ Form tambah pegawai
    public function create()
    {
        $pegawai = new Pegawai(); // biar form tidak error
        return view('pegawai.create', compact('pegawai'));
    }

    // ✅ Simpan pegawai baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawai,nip',
            'jabatan' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    // ✅ Edit pegawai
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    // ✅ Update pegawai
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawai,nip,' . $pegawai->id,
            'jabatan' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui!');
    }

    // ✅ Hapus pegawai
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
