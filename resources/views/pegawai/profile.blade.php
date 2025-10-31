@extends('layout.app')

@section('title', 'Profil Pegawai')

@section('content')
<div class="container fade-slide-up" style="margin-top: -5px;">
    {{-- Header --}}
    <div class="text-center mb-4" style="margin-top: 30px;">
        <h2 class="fw-bold fancy-title">🌸 Profil Pegawai 🌸</h2>
        <p class="text-light">Selamat datang, {{ Auth::user()->nama }}! 👋</p>
    </div>

    {{-- Card Profil --}}
    <div class="card profile-card shadow-lg border-0 mx-auto">
        <div class="card-body text-center p-5">

            {{-- Avatar --}}
            <div class="avatar-wrapper mx-auto mb-3">
                <img src="{{ asset('assets/images/logo 1.jpeg') }}" alt="Avatar" class="avatar-glow">
            </div>

            {{-- Nama --}}
            <h4 class="fw-bold name-glow">{{ Auth::user()->nama }}</h4>

            {{-- Username & Role --}}
            <p class="mb-1 text-secondary"><i class="ti ti-user me-2"></i>{{ Auth::user()->username }}</p>
            <p class="text-secondary"><i class="ti ti-shield me-2"></i>{{ ucfirst(Auth::user()->role) }}</p>

            {{-- Tombol Edit Profil --}}
            <a href="{{ route('pegawai.profile.edit') }}" class="btn btn-glow mt-4 px-5 py-2">
                <i class="ti ti-edit me-2"></i> Ubah Profil
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="fade-in mt-4 text-center success-alert">
            {{ session('success') }}
        </div>
    @endif
</div>

{{-- Custom CSS --}}
<style>
body {
    background: radial-gradient(circle at top left, #0f2027, #203a43, #2c5364);
    color: #fff;
    font-family: 'Poppins', sans-serif;
}

/* 🌸 Judul lembut & glowing */
.fancy-title {
    font-weight: 700;
    font-size: 2.2rem;
    background: linear-gradient(90deg, #9fd3f8, #ffffff, #9fd3f8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 18px rgba(150, 220, 255, 0.6);
}

/* ✨ Kartu Profil */
.profile-card {
    background: rgba(20, 28, 36, 0.7);
    backdrop-filter: blur(16px);
    border-radius: 25px;
    max-width: 480px;
    margin-top: -10px;
    box-shadow: 0 0 30px rgba(90, 200, 255, 0.15);
    transition: 0.3s;
}
.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 40px rgba(90, 200, 255, 0.25);
}

/* 🌟 Avatar dengan efek cahaya */
.avatar-wrapper {
    position: relative;
    width: 130px;
    height: 130px;
}
.avatar-glow {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    border: 3px solid #5af2f2;
    box-shadow: 0 0 20px #5af2f2;
    transition: 0.4s;
}
.avatar-glow:hover {
    transform: scale(1.08);
}

/* Ring cahaya berdenyut */
.avatar-wrapper::before {
    content: "";
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(90,242,242,0.5), transparent 70%);
    animation: pulse 2.5s infinite ease-in-out;
}
@keyframes pulse {
    0%, 100% { opacity: 0.4; transform: scale(1); }
    50% { opacity: 0.9; transform: scale(1.15); }
}

/* 🌈 Nama bersinar */
.name-glow {
    color: #fff;
    font-size: 1.5rem;
    text-shadow: 0 0 15px #5af2f2, 0 0 25px #5af2f2;
}

/* Tombol glowing */
.btn-glow {
    background: linear-gradient(90deg, #5af2f2, #91e9ff);
    color: #000;
    font-weight: 600;
    border-radius: 50px;
    box-shadow: 0 0 20px #5af2f2;
    transition: all 0.3s ease;
}
.btn-glow:hover {
    color: #fff;
    background: linear-gradient(90deg, #3dd0d0, #7cd4ff);
    box-shadow: 0 0 35px #5af2f2;
    transform: scale(1.05);
}

/* Alert cantik */
.success-alert {
    max-width: 500px;
    margin: 0 auto;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.8);
    color: #000;
    font-weight: 600;
    padding: 12px 15px;
    backdrop-filter: blur(6px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

/* Animasi masuk */
.fade-in {
    opacity: 0;
    animation: fadeIn 0.9s forwards ease-in-out;
}
.fade-slide-up {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeSlideUp 0.8s forwards ease-in-out;
}
@keyframes fadeIn {
    to { opacity: 1; }
}
@keyframes fadeSlideUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
