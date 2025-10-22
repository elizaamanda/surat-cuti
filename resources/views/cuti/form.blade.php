<style>
    /* Warna putih & dark mode untuk semua elemen form */
    .dark-form label {
        color: #fff !important;
        font-weight: 600;
    }

    .dark-form input,
    .dark-form select,
    .dark-form textarea {
        background-color: #2b2b3c !important;
        border: 1px solid #555 !important;
        color: #fff !important;
    }

    .dark-form input::placeholder {
        color: #ccc !important;
    }

    .dark-form select option {
        background-color: #2b2b3c !important;
        color: #fff !important;
    }
</style>

<div class="dark-form">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Pegawai</label>
        <input type="text" class="form-control" id="nama" name="nama"
               value="{{ old('nama', $cuti->nama ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
        <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
            <option value="">-- Pilih Jenis Cuti --</option>
            <option value="Cuti Tahunan" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
            <option value="Cuti Sakit" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit</option>
            <option value="Cuti Karena Alasan Penting" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Karena Alasan Penting' ? 'selected' : '' }}>Cuti Karena Alasan Penting</option>
            <option value="Cuti Besar" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Besar' ? 'selected' : '' }}>Cuti Besar</option>
            <option value="Cuti Hamil" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti Hamil' ? 'selected' : '' }}>Cuti Hamil</option>
            <option value="Cuti di Luar Tanggungan Negara" {{ old('jenis_cuti', $cuti->jenis_cuti ?? '') == 'Cuti di Luar Tanggungan Negara' ? 'selected' : '' }}>Cuti di Luar Tanggungan Negara</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="alasan" class="form-label">Alasan</label>
        <textarea class="form-control" id="alasan" name="alasan" rows="3" required>{{ old('alasan', $cuti->alasan ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
               value="{{ old('tanggal_mulai', $cuti->tanggal_mulai ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
               value="{{ old('tanggal_kembali', $cuti->tanggal_kembali ?? '') }}" required>
    </div>
</div>
