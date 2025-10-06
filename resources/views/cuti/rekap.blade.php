@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Rekap Cuti Pegawai {{ date('Y') }}</h2>

    <!-- Data untuk Chart -->
    <div id="cutiData"
        data-labels="{{ $rekap->pluck('nama')->implode('|') }}"
        data-values="{{ $rekap->pluck('total_cuti')->implode(',') }}"
        data-jenis-labels="{{ collect(array_keys($jenisCuti))->implode('|') }}"
        data-jenis-values="{{ collect(array_values($jenisCuti))->implode(',') }}"
        data-bulan-labels="{{ collect(array_keys($bulan))->map(fn($b) => date('F', mktime(0,0,0,$b,1)))->implode('|') }}"
        data-bulan-values="{{ collect(array_values($bulan))->implode(',') }}">
    </div>

    <!-- Tabel Rekap -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Total Cuti Diambil</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekap as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->total_cuti }} hari</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data cuti</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row mt-4">
        <div class="col-md-4">
            <canvas id="totalCutiChart" height="200"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="jenisCutiChart" height="200"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="bulanCutiChart" height="200"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const el = document.getElementById('cutiData');
    const labels = el.dataset.labels ? el.dataset.labels.split('|') : [];
    const diambilData = el.dataset.values ? el.dataset.values.split(',').map(Number) : [];
    const jenisLabels = el.dataset.jenisLabels ? el.dataset.jenisLabels.split('|') : [];
    const jenisData = el.dataset.jenisValues ? el.dataset.jenisValues.split(',').map(Number) : [];
    const bulanLabels = el.dataset.bulanLabels ? el.dataset.bulanLabels.split('|') : [];
    const bulanData = el.dataset.bulanValues ? el.dataset.bulanValues.split(',').map(Number) : [];

    // Grafik batang (Total Cuti per Pegawai)
    new Chart(document.getElementById('totalCutiChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cuti Diambil',
                data: diambilData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderRadius: 8
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Grafik pie (Jenis Cuti)
    new Chart(document.getElementById('jenisCutiChart'), {
        type: 'pie',
        data: {
            labels: jenisLabels,
            datasets: [{
                data: jenisData,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796']
            }]
        }
    });

    // Grafik garis (Rekap Cuti Per Bulan)
    new Chart(document.getElementById('bulanCutiChart'), {
        type: 'line',
        data: {
            labels: bulanLabels,
            datasets: [{
                label: 'Jumlah Cuti',
                data: bulanData,
                fill: false,
                borderColor: 'rgba(75,192,192,1)',
                tension: 0.3
            }]
        },
        options: { responsive: true }
    });
</script>
@endsection
