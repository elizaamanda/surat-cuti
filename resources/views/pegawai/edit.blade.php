@extends('layout.app')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container mt-4">
  <div class="card shadow-lg border-0 p-4" style="border-radius: 20px; backdrop-filter: blur(12px); background: rgba(255, 255, 255, 0.08);">
    <h2 class="mb-4 text-white text-center">🪶 Edit Data Pegawai</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="text-white">Nama</label>
          <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}" class="form-control bg-dark text-white border-0" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="text-white">NIP</label>
          <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}" class="form-control bg-dark text-white border-0" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="text-white">Pangkat</label>
          <input type="text" name="pangkat" value="{{ old('pangkat', $pegawai->pangkat) }}" class="form-control bg-dark text-white border-0" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="text-white">Jabatan</label>
          <input type="text" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}" class="form-control bg-dark text-white border-0" required>
        </div>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary px-4">
          ← Kembali
        </a>
        <button type="submit" class="btn btn-info text-dark px-4 fw-semibold">
          💾 Update
        </button>
      </div>
    </form>
  </div>
</div>

{{-- Style tambahan biar nyatu dengan tema Muichiro --}}
<style>
  body {
    background: linear-gradient(135deg, #1b1b1b, #203a43, #2c5364);
    background-attachment: fixed;
  }

  .form-control {
    border-radius: 10px;
    padding: 10px 12px;
    transition: 0.3s;
  }

  .form-control:focus {
    outline: none;
    box-shadow: 0 0 10px #4bd6d3;
    background-color: #222;
  }

  .btn-info {
    background: linear-gradient(90deg, #4bd6d3, #81e3e0);
    border: none;
  }

  .btn-secondary {
    background: #555;
    color: #fff;
    border: none;
  }

  .alert {
    border-radius: 10px;
  }
</style>
@endsection
