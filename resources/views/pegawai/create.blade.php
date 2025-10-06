@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pegawai</h2>

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        @include('pegawai.form', ['pegawai' => $pegawai])
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
