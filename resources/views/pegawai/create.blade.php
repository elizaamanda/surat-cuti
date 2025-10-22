@extends('layout.app')

@section('content')
<div class="container mt-4 text-white">
    <h2 class="mb-4">Tambah Pegawai</h2>

    @if ($errors->any())
        <div class="alert alert-danger text-white bg-danger bg-opacity-75 border-0">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pegawai.store') }}" method="POST" class="text-white">
        @csrf
        @include('pegawai.form')

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary text-white">Kembali</a>
        </div>
    </form>
</div>
@endsection
