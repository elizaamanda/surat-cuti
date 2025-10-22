@extends('layout.app')

@section('title','Tambah Cuti')

@section('content')
<div class="container mt-4">
    <h2>Tambah Cuti</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Pegawai</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
    <label for="jenis_cuti" class="form-label text-white">Jenis Cuti</label>
    <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
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
            <label>Alasan</label>
            <textarea name="alasan" class="form-control" required>{{ old('alasan') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
