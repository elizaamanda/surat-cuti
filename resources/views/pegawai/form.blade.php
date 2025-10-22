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
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama"
               value="{{ old('nama', $pegawai->nama ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip"
               value="{{ old('nip', $pegawai->nip ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <select class="form-control" id="jabatan" name="jabatan" required>
            <option value="">-- Pilih Jabatan --</option>
            <option value="Kepala" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kepala' ? 'selected' : '' }}>Kepala</option>
            <option value="Sekretaris" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
            <option value="Kabid. Penelitian dan Pengembangan" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kabid. Penelitian dan Pengembangan' ? 'selected' : '' }}>Kabid. Penelitian dan Pengembangan</option>
            <option value="Kabid. Pemerintahan dan Pembangunan Manusia" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kabid. Pemerintahan dan Pembangunan Manusia' ? 'selected' : '' }}>Kabid. Pemerintahan dan Pembangunan Manusia</option>
            <option value="Kabid. Perencanaan, Pengendalian dan Evaluasi" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kabid. Perencanaan, Pengendalian dan Evaluasi' ? 'selected' : '' }}>Kabid. Perencanaan, Pengendalian dan Evaluasi</option>
            <option value="Analis Kebijakan Ahli Muda" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Analis Kebijakan Ahli Muda' ? 'selected' : '' }}>Analis Kebijakan Ahli Muda</option>
            <option value="Bendahara" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
            <option value="Perencana Ahli Pertama" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Perencana Ahli Pertama' ? 'selected' : '' }}>Perencana Ahli Pertama</option>
            <option value="Pengadministrasi Umum" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Pengadministrasi Umum' ? 'selected' : '' }}>Pengadministrasi Umum</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="pangkat" class="form-label">Pangkat / Golongan</label>
        <select class="form-control" id="pangkat" name="pangkat" required>
            <option value="">-- Pilih Pangkat / Golongan --</option>
            <option value="Pembina Utama Utama-IV/c" {{ old('pangkat', $pegawai->pangkat ?? '') == 'Pembina Utama Utama-IV/c' ? 'selected' : '' }}>Pembina Utama Utama-IV/c</option>
            <option value="Pembina IV/a" {{ old('pangkat', $pegawai->pangkat ?? '') == 'Pembina IV/a' ? 'selected' : '' }}>Pembina IV/a</option>
            <option value="Penata Tk.I-III/d" {{ old('pangkat', $pegawai->pangkat ?? '') == 'Penata Tk.I-III/d' ? 'selected' : '' }}>Penata Tk.I-III/d</option>
            <option value="Penata III/c" {{ old('pangkat', $pegawai->pangkat ?? '') == 'Penata III/c' ? 'selected' : '' }}>Penata III/c</option>
            <option value="Penata Muda Tk.I-III/b" {{ old('pangkat', $pegawai->pangkat ?? '') == 'Penata Muda Tk.I-III/b' ? 'selected' : '' }}>Penata Muda Tk.I-III/b</option>
            <option value="Pengatur II/c" {{ old('pangkat', $pegawai->pangkat ?? '') == 'Pengatur II/c' ? 'selected' : '' }}>Pengatur II/c</option>
            <option value="PPPK" {{ old('pangkat', $pegawai->pangkat ?? '') == 'PPPK' ? 'selected' : '' }}>PPPK</option>
        </select>
    </div>
</div>
