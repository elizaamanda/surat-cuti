<div class="mb-3">
    <label for="nama" class="form-label">Nama Pegawai</label>
    <input type="text" class="form-control" id="nama" name="nama"
           value="{{ old('nama', $cuti->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
    <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
        <option value="">-- Pilih Jenis Cuti --</option>
        <option value="Cuti Tahunan">Cuti Tahunan</option>
        <option value="Cuti Sakit">Cuti Sakit</option>
        <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
        <option value="Cuti Besar">Cuti Besar</option>
        <option value="Cuti Hamil">Cuti Hamil</option>
        <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
    </select>
</div>

<div class="mb-3">
    <label for="alasan" class="form-label">Alasan</label>
    <textarea class="form-control" id="alasan" name="alasan" required>{{ old('alasan', $cuti->alasan ?? '') }}</textarea>
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
