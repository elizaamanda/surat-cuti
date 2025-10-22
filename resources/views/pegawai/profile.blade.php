@extends('layout.app')

@section('title', 'Profil Pegawai')

@section('content')
<div class="container fade-in" style="margin-top: -10px;"> {{-- Naik cukup tinggi --}}
    {{-- Header --}}
    <div class="text-center mb-4" style="margin-top: 30px;"> {{-- sedikit jarak dari navbar --}}
        <h2 class="fw-bold text-white" style="text-shadow: 0 0 15px #5af2f2;">
            Profil Pegawai
        </h2>
        <p class="text-light">Lihat dan perbarui informasi profil Anda di sini</p>
    </div>

    {{-- Card Profil --}}
    <div class="card bg-gradient-dark text-light shadow-lg border-0 mx-auto profile-card" 
         style="max-width: 500px; border-radius: 20px; margin-top: -15px;"> {{-- naik lebih tinggi --}}
        <div class="card-body text-center">

            {{-- Avatar --}}
            <img src="{{ asset('assets/images/10 (1).jpeg') }}" alt="Avatar" class="rounded-circle mb-3 avatar-glow">

            {{-- Nama --}}
            <h4 class="fw-bold name-glow text-white">{{ $user->nama }}</h4>

            {{-- Username & Role --}}
            <p class="mb-1"><i class="ti ti-user me-2"></i>{{ $user->username }}</p>
            <p><i class="ti ti-shield me-2"></i>{{ ucfirst($user->role) }}</p>

            {{-- Tombol Edit Profil --}}
            <a href="{{ route('pegawai.profile.edit') }}" class="btn btn-info mt-3 px-4 py-2 btn-glow">
                <i class="ti ti-edit me-2"></i> Ubah Profil
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="fade-in mt-4 text-center" 
             style="max-width: 500px; margin: 0 auto; 
                    border-radius: 15px; 
                    background: rgba(255, 255, 255, 0.7); 
                    color: #000; 
                    font-weight: 600; 
                    padding: 12px 15px; 
                    backdrop-filter: blur(6px); 
                    box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            {{ session('success') }}
        </div>
    @endif
</div>

{{-- Custom CSS --}}
<style>
.avatar-glow {
    width: 120px;
    height: 120px;
    border: 3px solid #5af2f2;
    box-shadow: 0 0 20px #5af2f2;
    transition: transform 0.3s ease;
}
.avatar-glow:hover {
    transform: scale(1.1);
}

.name-glow {
    color: #ffffff;
    text-shadow: 0 0 15px #5af2f2;
}

.profile-card {
    background: rgba(28, 28, 28, 0.65);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    margin-top: -15px; /* lebih naik */
}

.btn-glow {
    border-radius: 50px;
    box-shadow: 0 0 15px #5af2f2;
    transition: all 0.3s ease;
}
.btn-glow:hover {
    transform: scale(1.05);
    box-shadow: 0 0 25px #5af2f2;
}

/* Efek animasi halus */
.fade-in {
    opacity: 0;
    animation: fadeIn 0.8s forwards ease-in-out;
}

@keyframes fadeIn {
    to { opacity: 1; }
}
</style>
@endsection
