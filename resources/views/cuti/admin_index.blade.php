@extends('layout.app')

@section('title', 'Daftar Pengajuan Cuti - Admin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 text-white fw-bold">Daftar Pengajuan Cuti Pegawai</h2>

    {{-- ✅ Notifikasi Modern --}}
    @if(session('success'))
        <div class="alert-modern success" id="alertMessage">
            <i class="fa fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-modern error" id="alertMessage">
            <i class="fa fa-times-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="table-responsive mt-4">
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
    <span class="badge rounded-pill px-3 py-2 fw-bold"
        style="background-color:rgba(255,193,7,0.25); color:#b38a00; backdrop-filter:blur(6px);
               border:1px solid rgba(255,193,7,0.4); box-shadow:0 0 8px rgba(255,193,7,0.3);">
        Menunggu Persetujuan
    </span>
@elseif($item->status == 'Disetujui')
    <span class="badge rounded-pill px-3 py-2 fw-bold"
        style="background-color:rgba(40,167,69,0.25); color:#176d2f; backdrop-filter:blur(6px);
               border:1px solid rgba(40,167,69,0.4); box-shadow:0 0 8px rgba(40,167,69,0.3);">
        Cuti Telah Disetujui
    </span>
@else
    <span class="badge rounded-pill px-3 py-2 fw-bold"
        style="background-color:rgba(220,53,69,0.25); color:#8b1f29; backdrop-filter:blur(6px);
               border:1px solid rgba(220,53,69,0.4); box-shadow:0 0 8px rgba(220,53,69,0.3);">
        ❌ Cuti Ditolak
    </span>
@endif
</td>

<td>
    <div class="d-flex flex-wrap gap-2 justify-content-center">

        @if($item->status == 'Menunggu')
            {{-- Tombol Setuju --}}
            <form action="{{ route('cuti.setuju', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="btn btn-sm fw-bold rounded-pill px-3 py-1 shadow-sm"
                    style="border:1px solid rgba(40,167,69,0.5); color:#1c6c34;
                           background-color:rgba(40,167,69,0.15); backdrop-filter:blur(4px);
                           transition:all 0.25s ease;"
                    onmouseover="this.style.backgroundColor='rgba(40,167,69,0.4)'; this.style.color='white'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='rgba(40,167,69,0.15)'; this.style.color='#1c6c34'; this.style.transform='scale(1)';">
                    <i class="fa fa-check-circle me-1"></i> SETUJU
                </button>
            </form>

            {{-- Tombol Tolak --}}
            <form action="{{ route('cuti.tolak', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="btn btn-sm fw-bold rounded-pill px-3 py-1 shadow-sm"
                    style="border:1px solid rgba(220,53,69,0.5); color:#842029;
                           background-color:rgba(220,53,69,0.15); backdrop-filter:blur(4px);
                           transition:all 0.25s ease;"
                    onmouseover="this.style.backgroundColor='rgba(220,53,69,0.4)'; this.style.color='white'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='rgba(220,53,69,0.15)'; this.style.color='#842029'; this.style.transform='scale(1)';">
                    <i class="fa fa-times-circle me-1"></i> TOLAK
                </button>
            </form>

        @else
            {{-- Tombol Print --}}
            <a href="{{ route('cuti.print', $item->id) }}"
                class="btn btn-sm fw-bold rounded-pill px-3 py-1 shadow-sm"
                style="border:1px solid rgba(0,123,255,0.5); color:#0d6efd;
                       background-color:rgba(0,123,255,0.15); backdrop-filter:blur(4px);
                       transition:all 0.25s ease;"
                onmouseover="this.style.backgroundColor='rgba(0,123,255,0.4)'; this.style.color='white'; this.style.transform='scale(1.05)';"
                onmouseout="this.style.backgroundColor='rgba(0,123,255,0.15)'; this.style.color='#0d6efd'; this.style.transform='scale(1)';">
                <i class="fa fa-print me-1"></i> PRINT
            </a>
        @endif

        {{-- Tombol Hapus --}}
        <form action="{{ route('cuti.destroy', $item->id) }}" method="POST" class="d-inline"
            onsubmit="return confirm('Yakin ingin menghapus data cuti ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="btn btn-sm fw-bold rounded-pill px-3 py-1 shadow-sm"
                style="border:1px solid rgba(255,0,0,0.5); color:#b00000;
                       background-color:rgba(255,0,0,0.15); backdrop-filter:blur(4px);
                       transition:all 0.25s ease;"
                onmouseover="this.style.backgroundColor='rgba(255,0,0,0.4)'; this.style.color='white'; this.style.transform='scale(1.05)';"
                onmouseout="this.style.backgroundColor='rgba(255,0,0,0.15)'; this.style.color='#b00000'; this.style.transform='scale(1)';">
                <i class="fa fa-trash me-1"></i> HAPUS
            </button>
        </form>
    </div>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- === STYLE === --}}
<style>
body {
    background-color: #0d0d0d !important;
    color: #f8f9fa !important;
    font-family: 'Poppins', sans-serif;
}

.table-dark th, .table-dark td {
    border-color: #222;
}

.btn {
    border-radius: 8px;
    transition: 0.3s ease;
}
.glow-blue:hover {
    box-shadow: 0 0 15px #4da6ff;
}
.glow-red:hover {
    box-shadow: 0 0 15px #ff4d4d;
}
.glow-green:hover {
    box-shadow: 0 0 15px #4dff88;
}

/* === ALERT MODERN === */
.alert-modern {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: fit-content;
    margin: 0 auto 25px;
    padding: 15px 25px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    backdrop-filter: blur(12px);
    animation: fadeSlideDown 0.6s ease-in-out;
    box-shadow: 0 0 25px rgba(0, 255, 255, 0.15);
}

.alert-modern i {
    font-size: 1.4rem;
}

/* Warna lembut serasi dengan tema gelap */
.alert-modern.success {
    background: rgba(0, 255, 170, 0.1);
    border: 1px solid #00ff99;
    color: #00ffb3;
    text-shadow: 0 0 8px #00ffcc;
}

.alert-modern.error {
    background: rgba(255, 0, 80, 0.1);
    border: 1px solid #ff4d6d;
    color: #ff7b7b;
    text-shadow: 0 0 8px #ff4d6d;
}

/* Animasi masuk lembut */
@keyframes fadeSlideDown {
    from {
        opacity: 0;
        transform: translateY(-15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efek keluar */
@keyframes fadeOut {
    to {
        opacity: 0;
        transform: translateY(-15px);
    }
}
</style>

{{-- === SCRIPT === --}}
<script>
    // Otomatis hilang setelah 3 detik
    document.addEventListener('DOMContentLoaded', () => {
        const alertBox = document.getElementById('alertMessage');
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.animation = 'fadeOut 0.5s forwards';
                setTimeout(() => alertBox.remove(), 500);
            }, 3000);
        }
    });
</script>
@endsection
