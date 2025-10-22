@extends('layout.app')

@section('title', 'Edit Profil Pegawai')

@section('content')
<div class="container mt-5 fade-in">

    {{-- Header --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold text-white" style="text-shadow: 0 0 15px #5af2f2;">Edit Profil</h2>
        <p class="text-light">Ubah informasi profil Anda di sini</p>
    </div>

    {{-- Form Edit --}}
    <div class="card bg-dark text-light shadow-lg border-0 mx-auto" style="max-width: 500px; border-radius: 20px;">
        <div class="card-body">

            <form method="POST" action="{{ route('pegawai.profile.update') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label text-white">Nama:</label>
                    <input type="text" class="form-control bg-dark text-white @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Username & Role (readonly) --}}
                <div class="mb-3">
                    <label class="form-label text-white">Username:</label>
                    <input type="text" class="form-control bg-dark text-white" value="{{ $user->username }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Role:</label>
                    <input type="text" class="form-control bg-dark text-white" value="{{ ucfirst($user->role) }}" readonly>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-info btn-glow px-4">Simpan</button>
                    <a href="{{ route('pegawai.profile') }}" class="btn btn-secondary btn-glow px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>

{{-- CSS Glow --}}
<style>
.btn-glow {
    border-radius: 50px;
    box-shadow: 0 0 15px #5af2f2;
    transition: all 0.3s ease;
}
.btn-glow:hover {
    transform: scale(1.05);
    box-shadow: 0 0 25px #5af2f2;
}
</style>
@endsection
