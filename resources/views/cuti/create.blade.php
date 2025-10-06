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
            <label>Jenis Cuti</label>
            <input type="text" name="jenis_cuti" class="form-control" value="{{ old('jenis_cuti') }}" required>
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
