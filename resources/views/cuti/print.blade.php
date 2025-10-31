<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Permintaan dan Pemberian Cuti</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 28px;
            color: #000;
            font-size: 13px;
            line-height: 1.3;
        }

        .kop-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }

        .kop-left {
            width: 65%;
        }

        .kop-right {
            text-align: right;
            width: 35%;
        }

        h4 {
            text-align: center;
            margin: 6px 0 6px;
            text-decoration: underline;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 4px;
        }

        td, th {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: top;
        }

        .center { text-align: center; }
        .bold { font-weight: bold; }
        .section-title { margin-top: 10px; font-weight: bold; }

        .signature { text-align: right; margin-top: 22px; }
        .signature-space { height: 60px; }

        .checkbox { font-family: DejaVu Sans, Arial, sans-serif; }

        @media print {
            body { margin: 10mm; zoom: 92%; }
            button { display: none; }
            table, td, th { page-break-inside: avoid; }
        }
    </style>
</head>
<body>

    <!-- === KOP SURAT === -->
    <div class="kop-container">
        <div class="kop-left">
            ANAK LAMPIRAN 1.d<br>
            PERATURAN BADAN KEPEGAWAIAN NEGARA<br>
            REPUBLIK INDONESIA NOMOR 24 TAHUN 2017<br>
            TENTANG<br>
            TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
        </div>
        <div class="kop-right">
            Karang Baru, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br><br>
            Kepada Yth.<br>
            Kepala Bappeda<br>
            Kabupaten Aceh Tamiang
        </div>
    </div>

    <h4>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h4>

    {{-- BAGIAN I --}}
    <p class="section-title">I. DATA PEGAWAI</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>{{ $cuti->nama }}</td>
            <td>NIP</td>
            <td>{{ $cuti->nip ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>{{ $cuti->jabatan ?? 'Penata / III.c' }}</td>
            <td>Masa Kerja</td>
            <td>{{ $cuti->masa_kerja ?? '18 Tahun' }}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td colspan="3">Badan Perencanaan Pembangunan Daerah Kabupaten Aceh Tamiang</td>
        </tr>
    </table>

    {{-- BAGIAN II --}}
    <p class="section-title">II. JENIS CUTI YANG DIAMBIL</p>
    @php $jenis = strtolower($cuti->jenis_cuti); @endphp
    <table class="checkbox">
        <tr>
            <td>{{ $jenis == 'cuti tahunan' ? '✔' : '☐' }} Cuti Tahunan</td>
            <td>{{ $jenis == 'cuti besar' ? '✔' : '☐' }} Cuti Besar</td>
            <td>{{ $jenis == 'cuti sakit' ? '✔' : '☐' }} Cuti Sakit</td>
        </tr>
        <tr>
            <td>{{ $jenis == 'cuti melahirkan' ? '✔' : '☐' }} Cuti Melahirkan</td>
            <td>{{ $jenis == 'cuti karena alasan penting' ? '✔' : '☐' }} Cuti Karena Alasan Penting</td>
            <td>{{ $jenis == 'cuti di luar tanggungan negara' ? '✔' : '☐' }} Cuti di Luar Tanggungan Negara</td>
        </tr>
    </table>

    {{-- BAGIAN III --}}
    <p class="section-title">III. ALASAN CUTI</p>
    <table><tr><td>{{ $cuti->alasan }}</td></tr></table>

    {{-- BAGIAN IV --}}
    <p class="section-title">IV. LAMANYA CUTI</p>
    <table>
        <tr>
            <td>Selama</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->diffInDays($cuti->tanggal_kembali) + 1 }} Hari</td>
            <td>Mulai tanggal</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d F Y') }}</td>
            <td>s/d</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_kembali)->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    {{-- BAGIAN V --}}
    <p class="section-title">V. CATATAN CUTI</p>
    <table>
        <tr><th>Tahun</th><th>Sisa</th><th>Keterangan</th></tr>
        <tr><td>N-2</td><td>-</td><td></td></tr>
        <tr><td>N-1</td><td>-</td><td></td></tr>
        <tr><td>N</td><td>-</td><td></td></tr>
    </table>

    {{-- TANDA TANGAN PEGAWAI --}}
    <div class="signature">
        <p>Hormat saya,</p>
        <div class="signature-space"></div>
        <p><strong>{{ $cuti->nama }}</strong><br>
        NIP. {{ $cuti->nip ?? '-' }}</p>
    </div>

    {{-- BAGIAN VII --}}
    <p class="section-title">VII. PERTIMBANGAN ATASAN LANGSUNG</p>
    <table>
        <tr class="center">
            <th>DISETUJUI</th>
            <th>PERUBAHAN</th>
            <th>DITANGGUHKAN</th>
            <th>TIDAK DISETUJUI</th>
        </tr>
        <tr class="signature-space"><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td colspan="4">Kabid. Perencanaan Pengendalian Dan Evaluasi</td>
        </tr>
        <tr>
            <td colspan="4">
                Renir Hidayat, S.STP., M.A.P<br>
                NIP. 199012212010210601
            </td>
        </tr>
    </table>

    {{-- BAGIAN VIII --}}
    <p class="section-title">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</p>
    <table>
        <tr class="center">
            <th>DISETUJUI</th>
            <th>PERUBAHAN</th>
            <th>DITANGGUHKAN</th>
            <th>TIDAK DISETUJUI</th>
        </tr>
        <tr class="signature-space"><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td colspan="4" class="center">Kepala Bappeda Kabupaten Aceh Tamiang</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="line-height: 1.6; padding-top: 25px;">
                <strong><u>Ir. Muhammad Zein</u></strong><br>
                Pembina Utama Muda<br>
                NIP. 196809251994031005
            </td>
        </tr>
    </table>

    <br>
    <p><strong>Catatan:</strong><br>
    * Coret yang tidak perlu<br>
    ** Pilih salah satu dengan memberi tanda centang (√)<br>
    *** Diisi oleh pejabat kepegawaian sebelum PNS mengajukan cuti</p>

    <div class="center">
        <button onclick="window.print()">🖨️ Cetak Surat Cuti</button>
    </div>

</body>
</html>
