@extends('layout.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="card shadow-lg border-0" style="background-color:#000; border-radius:12px;">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold text-white mb-0">📋 Data Pegawai</h4>
      <a href="{{ route('pegawai.create') }}" class="btn btn-success px-3 py-2 rounded-pill shadow-sm">
        <i class="ti ti-plus"></i> Tambah Pegawai
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-dark table-hover text-white align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Pangkat</th>
            <th>Jabatan</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pegawais as $p)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->nip }}</td>
            <td>{{ $p->pangkat }}</td>
            <td>{{ $p->jabatan }}</td>
            <td class="text-center">
              <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-sm btn-warning me-1 rounded-pill px-3">
                <i class="ti ti-edit"></i> Edit
              </a>
              <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3"
                  onclick="return confirm('Yakin hapus data?')">
                  <i class="ti ti-trash"></i> Hapus
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-3 text-secondary">Tidak ada data pegawai.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- === Custom CSS === --}}
<style>
  body {
    background-color: #000 !important;
  }

  .card {
    background-color: #0a0a0a !important;
    color: white !important;
    border: 1px solid #222;
  }

  table.table-dark {
    background-color: #0f0f0f !important;
    color: white !important;
    border-collapse: collapse;
  }

  table.table-dark thead {
    background-color: #1a1a1a !important;
  }

  table.table-dark tbody tr:hover {
    background-color: #242424 !important;
  }

  th, td {
    color: white !important;
    border-color: #333 !important;
  }

  .btn-success {
    background-color: #28a745 !important;
    border: none;
    color: white !important;
  }

  .btn-warning {
    background-color: #ffc107 !important;
    color: black !important;
    border: none;
  }

  .btn-danger {
    background-color: #dc3545 !important;
    color: white !important;
    border: none;
  }
</style>
@endsection
