@extends('layout.app')

@section('title', 'Rekap Cuti Pegawai')

@section('content')
<div class="container-fluid py-5 fade-in">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-white" style="text-shadow: 0 0 20px #5af2f2;">
            📊 Rekapitulasi Data Cuti Pegawai 2025
        </h2>
        <p class="text-secondary mt-2">
            Data rekap cuti pegawai berdasarkan total hari cuti, jenis cuti, dan bulan pengajuan.
        </p>
    </div>

    {{-- Kartu Utama --}}
    <div class="card border-0 shadow-lg rounded-4"
         style="background: linear-gradient(145deg, #022c36, #003a45); color: #e8f9fa;">

        <div class="card-body p-4">

            {{-- Bagian 1: Total Hari Cuti per Pegawai --}}
            <h5 class="fw-semibold mb-3" style="color: #5af2f2;">1️⃣ Total Hari Cuti per Pegawai</h5>
            <div class="table-responsive mb-5">
                <table class="table table-hover text-center align-middle"
                       style="background-color: #012b36; color: #e8f9fa; border-radius: 8px; overflow: hidden;">
                    <thead style="background-color: #03424d; color: #5af2f2;">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Total Hari Cuti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekap as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->nama }}</td>
                                <td>{{ $r->total_cuti }} Hari</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">Belum ada data cuti.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Bagian 2: Jumlah Pengajuan Berdasarkan Jenis Cuti --}}
            <h5 class="fw-semibold mb-3" style="color: #5af2f2;">2️⃣ Jumlah Pengajuan Berdasarkan Jenis Cuti</h5>
            <div class="table-responsive mb-5">
                <table class="table table-hover text-center align-middle"
                       style="background-color: #012b36; color: #e8f9fa; border-radius: 8px; overflow: hidden;">
                    <thead style="background-color: #03424d; color: #5af2f2;">
                        <tr>
                            <th>No</th>
                            <th>Jenis Cuti</th>
                            <th>Jumlah Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenisCuti as $jenis => $total)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jenis }}</td>
                                <td>{{ $total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">Belum ada data jenis cuti.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Bagian 3: Jumlah Pengajuan per Bulan --}}
            <h5 class="fw-semibold mb-3" style="color: #5af2f2;">3️⃣ Jumlah Pengajuan per Bulan</h5>
            <div class="table-responsive mb-4">
                <table class="table table-hover text-center align-middle"
                       style="background-color: #012b36; color: #e8f9fa; border-radius: 8px; overflow: hidden;">
                    <thead style="background-color: #03424d; color: #5af2f2;">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Jumlah Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bulan as $b => $total)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ DateTime::createFromFormat('!m', $b)->format('F') }}</td>
                                <td>{{ $total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">Belum ada data bulanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Tombol Kembali --}}
            <div class="text-end mt-4">
                <a href="{{ route('cuti.index') }}" 
                   class="btn btn-outline-info px-4 py-2 rounded-3 fw-semibold"
                   style="border-color: #5af2f2; color: #5af2f2;">
                    ⬅️ Kembali
                </a>
            </div>

        </div>
    </div>
</div>

{{-- Style tambahan biar lebih glowing --}}
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(90, 242, 242, 0.15) !important;
        transition: 0.3s;
    }
    h5 {
        text-shadow: 0 0 8px rgba(90, 242, 242, 0.4);
    }
    .card {
        margin-top: -9px; /* kotaknya sedikit naik */
    }
</style>
@endsection
