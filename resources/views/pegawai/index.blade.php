@extends('layout.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <h4 class="mb-4 text-dark">📋 Data Pegawai</h4>
    <a href="{{ route('pegawai.create') }}" class="btn btn-success mb-3">
      <i class="ti ti-plus"></i> Tambah Pegawai
    </a>

    <div class="table-responsive">
      <table class="table table-dark-custom">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Pangkat</th>
            <th>Jabatan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pegawais as $p)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->nip }}</td>
            <td>{{ $p->pangkat }}</td>
            <td>{{ $p->jabatan }}</td>
            <td>
              <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-sm btn-warning">
                <i class="ti ti-edit"></i> Edit
              </a>
              <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
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
