@extends('layout.app')

@section('title', 'Daftar Cuti')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <h4 class="mb-4 text-dark">📅 Daftar Cuti</h4>
    <a href="{{ route('cuti.create') }}" class="btn btn-success mb-3">
      <i class="ti ti-plus"></i> Tambah Cuti
    </a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
      <table class="table table-dark-custom">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Cuti</th>
            <th>Alasan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuti as $c)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->jenis_cuti }}</td>
            <td>{{ $c->alasan }}</td>
            <td>{{ $c->tanggal_mulai }}</td>
            <td>{{ $c->tanggal_kembali }}</td>
            <td>
              <a href="{{ route('cuti.edit', $c->id) }}" class="btn btn-sm btn-warning">
                <i class="ti ti-edit"></i> Edit
              </a>
              <form action="{{ route('cuti.destroy', $c->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')">
                  <i class="ti ti-trash"></i> Hapus
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Tambahkan style tabel dark --}}
<style>
  /* Tabel dark mode */
  table.table-dark-custom {
    background-color: #1c1c1c;
    color: #eaeaea;
    border-collapse: collapse;
    border: 1px solid #2c2c2c;
  }

  table.table-dark-custom th {
    background-color: #2c2c2c;
    color: #fff;
    border: 1px solid #333;
    text-align: center;
  }

  table.table-dark-custom td {
    background-color: #1f1f1f;
    color: #ccc;
    border: 1px solid #2c2c2c;
  }

  /* Hover efek */
  table.table-dark-custom tbody tr:hover {
    background-color: #2a2a2a;
    color: #fff;
  }

  /* Tombol dark mode */
  .btn-success {
    background-color: #28a745;
    border: none;
  }
  .btn-warning {
    background-color: #ffc107;
    border: none;
    color: #000;
  }
  .btn-danger {
    background-color: #dc3545;
    border: none;
  }
</style>
@endsection
