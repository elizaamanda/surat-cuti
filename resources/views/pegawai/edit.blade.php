@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Pegawai</h2>

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pegawai.form', ['pegawai' => $pegawai])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
