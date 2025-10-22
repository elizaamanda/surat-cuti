@extends('layout.app')

@section('title', 'Dashboard Pegawai')

@section('content')
<div class="container fade-slide-down" style="margin-top: -20px;">
    <!-- Header -->
    <div class="text-center mb-4 fade-slide-down">
        <h2 class="fw-bold text-white" style="text-shadow: 0 0 20px #5af2f2;">
            Selamat Datang, {{ Auth::user()->nama }} 👋
        </h2>
        <p class="text-light mt-2">
            Anda login sebagai <span class="fw-semibold text-info">Pegawai</span>
        </p>
    </div>

    <!-- Statistik Cuti -->
    <div class="d-flex justify-content-center gap-4 mb-5 fade-slide-up">
        <div class="stat-box bg-gradient-to-r from-cyan-600 to-teal-500">
            <h3 class="text-white mb-0 fw-bold">12</h3>
            <p class="text-white-50 mb-0">Total Cuti</p>
        </div>
        <div class="stat-box bg-gradient-to-r from-teal-500 to-emerald-500">
            <h3 class="text-white mb-0 fw-bold">8</h3>
            <p class="text-white-50 mb-0">Cuti Diambil</p>
        </div>
        <div class="stat-box bg-gradient-to-r from-green-500 to-lime-500">
            <h3 class="text-white mb-0 fw-bold">4</h3>
            <p class="text-white-50 mb-0">Sisa Cuti</p>
        </div>
    </div>

    <!-- Kalender & Grafik -->
    <div class="row justify-content-center fade-slide-up delay-1">
        <!-- Kalender -->
        <div class="col-md-5 mb-4">
            <div class="glass-card p-4">
                <h5 class="text-info mb-3"><i class="ti ti-calendar"></i> Kalender</h5>
                <div id="calendar"></div>
            </div>
        </div>

        <!-- Grafik Cuti -->
        <div class="col-md-5 mb-4">
            <div class="glass-card p-4">
                <h5 class="text-info mb-3"><i class="ti ti-bar-chart"></i> Rekap Cuti</h5>
                <canvas id="cutiChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Motivasi -->
    <div class="text-center mt-4 fade-slide-up delay-2">
        <p class="text-light fst-italic" style="opacity: 0.8;">
            “Kerja keras hari ini adalah istirahat yang layak esok hari.” 🌿
        </p>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Kalender sederhana
    const calendar = document.getElementById('calendar');
    const now = new Date();
    const month = now.toLocaleString('id-ID', { month: 'long', year: 'numeric' });
    let days = '';
    for (let i = 1; i <= 31; i++) {
        days += `<div class="day ${i === now.getDate() ? 'active' : ''}">${i}</div>`;
    }
    calendar.innerHTML = `
        <div class="month-title">${month}</div>
        <div class="days">${days}</div>
    `;

    // Grafik Chart.js
    const ctx = document.getElementById('cutiChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total', 'Diambil', 'Sisa'],
            datasets: [{
                data: [12, 8, 4],
                backgroundColor: [
                    'rgba(0, 255, 255, 0.7)',
                    'rgba(0, 200, 150, 0.7)',
                    'rgba(255, 220, 120, 0.7)'
                ],
                borderRadius: 10,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { ticks: { color: '#b0e0e6' }, grid: { display: false } },
                y: { ticks: { color: '#b0e0e6' }, grid: { color: 'rgba(255,255,255,0.1)' } }
            },
            animation: { duration: 2000, easing: 'easeOutQuart' }
        }
    });
});
</script>

<style>
body {
    background: linear-gradient(135deg, #052431, #0c4453);
    min-height: 100vh;
    overflow-x: hidden;
    color: white;
}

/* Statistik box */
.stat-box {
    width: 150px;
    padding: 20px 0;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(90, 242, 242, 0.2);
    backdrop-filter: blur(8px);
}

/* Glass effect card */
.glass-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(90, 242, 242, 0.1);
    backdrop-filter: blur(10px);
}

/* Kalender */
#calendar {
    text-align: center;
}
.month-title {
    color: #5af2f2;
    font-weight: 600;
    margin-bottom: 10px;
}
.days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
}
.day {
    color: #b0e0e6;
    padding: 8px;
    border-radius: 8px;
}
.day.active {
    background-color: rgba(90, 242, 242, 0.4);
    color: #fff;
}

/* Animasi */
.fade-slide-down {
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeSlideDown 0.8s forwards;
}

.fade-slide-up {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeSlideUp 0.8s forwards;
}

.delay-1 { animation-delay: 0.4s; }
.delay-2 { animation-delay: 0.8s; }

@keyframes fadeSlideDown { to { opacity: 1; transform: translateY(0); } }
@keyframes fadeSlideUp { to { opacity: 1; transform: translateY(0); } }
</style>
@endsection
