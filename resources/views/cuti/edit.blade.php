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
            <label>Jenis Cuti</label>
            <input type="text" name="jenis_cuti" class="form-control" value="{{ $cuti->jenis_cuti }}" required>
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
