@extends('layout.app')

@section('title', 'Daftar Pengajuan Cuti - Admin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 text-white fw-bold">Daftar Pengajuan Cuti Pegawai</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle rounded-3 shadow-lg" style="border-radius: 12px; overflow: hidden;">
            <thead class="bg-black text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Cuti</th>
                    <th>Alasan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($cuti as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama }}</td>
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
                        @if($item->status == 'Menunggu')
                            <form action="{{ route('cuti.setuju', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm glow-green">Setuju</button>
                            </form>

                            <form action="{{ route('cuti.tolak', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm glow-red">Tolak</button>
                            </form>
                        @else
                            <a href="{{ route('cuti.print', $item->id) }}" class="btn btn-outline-light btn-sm glow-blue">Print</a>
                        @endif
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
.glow-red:hover {
    box-shadow: 0 0 12px #ff4d4d;
}
.glow-green:hover {
    box-shadow: 0 0 12px #4dff88;
}
</style>
@endsection
