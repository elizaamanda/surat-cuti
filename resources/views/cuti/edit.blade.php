@extends('layout.app')

@section('title', 'Edit Cuti')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0" style="background-color: #0a0a0a; color: white; border-radius: 12px;">
        <div class="card-body">
            <h3 class="fw-bold mb-4 text-white">
                ✏️ Edit Pengajuan Cuti
            </h3>

            @if ($errors->any())
                <div class="alert alert-danger text-white bg-danger border-0">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Pegawai --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #ffffff;">Nama Pegawai</label>
                    <input 
                        type="text" 
                        name="nama" 
                        value="{{ $cuti->nama }}" 
                        class="form-control" 
                        style="background-color: #111; color: #fff; border: 1px solid #333; padding: 10px; border-radius: 6px;"
                        @if(Auth::user()->role == 'admin')
                            readonly style="background-color: #2c2c2c; color: #aaa; cursor: not-allowed;"
                        @endif
                        required
                    >
                </div>

                {{-- Jenis Cuti --}}
                <div class="mb-3">
                    <label for="jenis_cuti" class="form-label fw-semibold" style="color: #ffffff;">Jenis Cuti</label>
                    <select name="jenis_cuti" id="jenis_cuti"
                        class="form-control"
                        style="background-color: #111; color: #fff; border: 1px solid #333; padding: 10px; border-radius: 6px;"
                        required>
                        <option value="">-- Pilih Jenis Cuti --</option>
                        <option value="Cuti Tahunan" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                        <option value="Cuti Sakit" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                        <option value="Cuti Karena Alasan Penting" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Karena Alasan Penting' ? 'selected' : '' }}>Cuti Karena Alasan Penting</option>
                        <option value="Cuti Besar" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Besar' ? 'selected' : '' }}>Cuti Besar</option>
                        <option value="Cuti Hamil" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Hamil' ? 'selected' : '' }}>Cuti Hamil</option>
                        <option value="Cuti di Luar Tanggungan Negara" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti di Luar Tanggungan Negara' ? 'selected' : '' }}>Cuti di Luar Tanggungan Negara</option>
                    </select>
                </div>

                {{-- Alasan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #ffffff;">Alasan</label>
                    <textarea name="alasan"
                        class="form-control"
                        style="background-color: #111; color: #fff; border: 1px solid #333; padding: 10px; border-radius: 6px;"
                        required>{{ $cuti->alasan }}</textarea>
                </div>

                {{-- Tanggal --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold" style="color: #ffffff;">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai"
                            value="{{ $cuti->tanggal_mulai }}"
                            class="form-control"
                            style="background-color: #111; color: #fff; border: 1px solid #333; padding: 10px; border-radius: 6px;"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold" style="color: #ffffff;">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali"
                            value="{{ $cuti->tanggal_kembali }}"
                            class="form-control"
                            style="background-color: #111; color: #fff; border: 1px solid #333; padding: 10px; border-radius: 6px;"
                            required>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('cuti.index') }}"
                        class="btn btn-secondary"
                        style="background-color: #444; color: white; border: none; padding: 10px 20px; border-radius: 50px;">
                        <i class="ti ti-arrow-left"></i> Batal
                    </a>
                    <button type="submit"
                        class="btn btn-success"
                        style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 50px;">
                        💾 Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
