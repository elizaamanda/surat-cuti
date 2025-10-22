@extends('layout.app')

@section('title','Edit Cuti')

@section('content')
<div class="container mt-4">
    <h2>Edit Cuti</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Pegawai</label>
            <input type="text" name="nama" class="form-control" value="{{ $cuti->nama }}" required>
        </div>

        <div class="mb-3">
        <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
        <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
            <option value="">-- Pilih Jenis Cuti --</option>
            <option value="Cuti Tahunan" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
            <option value="Cuti Sakit" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit</option>
            <option value="Cuti Karena Alasan Penting" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Karena Alasan Penting' ? 'selected' : '' }}>Cuti Karena Alasan Penting</option>
            <option value="Cuti Besar" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Besar' ? 'selected' : '' }}>Cuti Besar</option>
            <option value="Cuti Hamil" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Hamil' ? 'selected' : '' }}>Cuti Hamil</option>
            <option value="Cuti di Luar Tanggungan Negara" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti di Luar Tanggungan Negara' ? 'selected' : '' }}>Cuti di Luar Tanggungan Negara</option>
        </select>
    </div>

        <div class="mb-3">
            <label>Alasan</label>
            <textarea name="alasan" class="form-control" required>{{ $cuti->alasan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $cuti->tanggal_mulai }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" value="{{ $cuti->tanggal_kembali }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
