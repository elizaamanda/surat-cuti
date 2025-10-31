@extends('layout.app')

@section('title', 'Tambah Cuti')

@section('content')
<div class="container mt-3 text-white">
    <h2 class="fw-bold mb-4 text-center fancy-title">
        ✨ Tambah Data Cuti ✨
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger bg-dark border-0 text-white">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.store') }}" method="POST"
          class="p-4 rounded-4 shadow-lg text-white mx-auto"
          style="background-color:#111; border:1px solid #1f2e3d; max-width:750px;">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold text-white">Nama Pegawai</label>
            <input type="text" name="nama" class="form-control custom-input text-white" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_cuti" class="form-label fw-semibold text-white">Jenis Cuti</label>
            <select name="jenis_cuti" id="jenis_cuti" class="form-control custom-input text-white" required>
                <option value="">-- Pilih Jenis Cuti --</option>
                <option value="Cuti Tahunan">Cuti Tahunan</option>
                <option value="Cuti Sakit">Cuti Sakit</option>
                <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                <option value="Cuti Besar">Cuti Besar</option>
                <option value="Cuti Hamil">Cuti Hamil</option>
                <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-white">Alasan</label>
            <textarea name="alasan" class="form-control custom-input text-white" required>{{ old('alasan') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-white">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control custom-input text-white" value="{{ old('tanggal_mulai') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-white">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control custom-input text-white" value="{{ old('tanggal_kembali') }}" required>
        </div>

        <div class="d-flex justify-content-end gap-3 mt-4">
            <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm">💾 Simpan</button>
            <a href="{{ route('cuti.index') }}" class="btn btn-secondary px-4 fw-bold shadow-sm">❌ Batal</a>
        </div>
    </form>
</div>

<style>
body {
    background-color: #0d0d0d !important;
    color: white !important;
    font-family: 'Poppins', sans-serif;
}

/* ✨ Judul cantik dengan efek cahaya lembut */
.fancy-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 2rem;
    background: linear-gradient(90deg, #9fd3f8, #cfefff, #9fd3f8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 12px rgba(173, 216, 255, 0.4);
    letter-spacing: 1px;
}

/* Kotak input warna Muichiro (abu kebiruan lembut) */
.custom-input {
    background-color: #2c3e50 !important;
    color: white !important;
    border: 1px solid #3f5f76;
    border-radius: 10px;
    transition: 0.3s;
}

.custom-input:focus {
    background-color: #34495e !important;
    box-shadow: 0 0 12px rgba(90, 180, 255, 0.4);
    border-color: #5aa0c8;
}

/* Tombol hover */
.btn {
    border-radius: 10px;
    transition: all 0.3s ease;
}
.btn:hover {
    transform: scale(1.05);
}
</style>
@endsection
