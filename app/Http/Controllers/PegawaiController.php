<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nip' => 'required|unique:pegawais,nip',
            'pangkat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
        ]);

        Pegawai::create($validated);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nip' => 'required|unique:pegawais,nip,' . $pegawai->id,
            'pangkat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
        ]);

        $pegawai->update($validated);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
