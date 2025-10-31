@extends('layout.app')

@section('title', 'Daftar Pengajuan Cuti Saya')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white fw-bold">✨ Pengajuan Cuti Saya ✨</h2>
        <a href="{{ route('cuti.create') }}" class="btn btn-primary glow-blue">+ Ajukan Cuti</a>
    </div>

    @if(session('success'))
        <div class="custom-alert text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-striped align-middle shadow-lg rounded-3">
            <thead class="bg-black text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Jenis Cuti</th>
                    <th>Alasan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Print</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($cuti as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->jenis_cuti }}</td>
                    <td>{{ $item->alasan }}</td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        @if($item->status == 'Menunggu')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($item->status == 'Disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>

                    <td>
                        @if($item->status == 'Disetujui')
                            <a href="{{ route('cuti.print', $item->id) }}" class="btn btn-outline-light btn-sm glow-blue">Print</a>
                        @else
                            <span class="text-secondary">-</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('cuti.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark me-2">
                            <i class="fa fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('cuti.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengajuan cuti ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
body {
    background-color: #0d0d0d !important;
    color: white !important;
}

.table-dark th, .table-dark td {
    border-color: #333;
}

.btn {
    border-radius: 8px;
    transition: 0.3s ease;
}

.glow-blue:hover {
    box-shadow: 0 0 12px #4da6ff;
}

h2 {
    text-shadow: 0 0 12px #4da6ff;
}

/* 🌟 Alert custom agar kontras dengan background gelap */
.custom-alert {
    background-color: rgba(0, 255, 100, 0.15);
    border: 1px solid #00ff99;
    color: #00ff99;
    font-weight: bold;
    padding: 12px;
    border-radius: 10px;
    text-shadow: 0 0 8px #00ff99;
    box-shadow: 0 0 10px rgba(0,255,150,0.3);
}
</style>
@endsection
