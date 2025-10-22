@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #bde6ff, #e6f7ff, #d5eeff);
    background-attachment: fixed;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
    color: #f5faff;
    position: relative;
  }

  /* Efek kabut lembut */
  .mist {
    position: fixed;
    top: 0; left: 0;
    width: 200%;
    height: 100%;
    background: url("{{ asset('assets/images/mist.png') }}") repeat-x;
    opacity: 0.2;
    animation: moveMist 120s linear infinite;
    z-index: 0;
  }

  @keyframes moveMist {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  .dashboard-container {
    position: relative;
    z-index: 2;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(14px);
    border-radius: 25px;
    padding: 40px;
    max-width: 850px;
    margin: 80px auto;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    text-align: center;
  }

  .dashboard-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: #c8f4ff;
    text-shadow: 0 0 15px #5af2f2;
  }

  .dashboard-subtitle {
    font-size: 1.05rem;
    color: rgba(240, 255, 255, 0.85);
    margin-bottom: 30px;
  }

  .card-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
  }

  .muichiro-card {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    border-radius: 18px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 5px 15px rgba(90, 240, 255, 0.15);
    padding: 25px;
    width: 220px;
    transition: 0.3s ease;
  }

  .muichiro-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(90, 240, 255, 0.25);
    background: rgba(255, 255, 255, 0.15);
  }

  .card-icon {
    font-size: 45px;
    color: #7be0ff;
    margin-bottom: 10px;
  }

  .chart-container {
    width: 100%;
    max-width: 500px;
    margin: 40px auto 10px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 6px 18px rgba(90, 240, 255, 0.1);
  }

  canvas {
    border-radius: 12px;
  }

  .muichiro-mini {
    position: absolute;
    right: 30px;
    bottom: -20px;
    width: 120px;
    opacity: 0.85;
    animation: floaty 6s ease-in-out infinite alternate;
  }

  @keyframes floaty {
    0% { transform: translateY(0); }
    100% { transform: translateY(-10px); }
  }
</style>

<div class="mist"></div>

<div class="dashboard-container">
  <h2 class="dashboard-title">🌫️ Dashboard Pegawai 🌫️</h2>
  <p class="dashboard-subtitle">Halo {{ auth()->user()->nama ?? 'User' }}, semoga harimu setenang kabut di Gunung Mist 🌬️</p>

  <div class="card-section">
    <div class="muichiro-card">
      <div class="card-icon">👤</div>
      <h5 class="fw-bold text-light">Data Pegawai</h5>
      <p class="text-secondary">Kelola data pegawai</p>
    </div>

    <div class="muichiro-card">
      <div class="card-icon">📄</div>
      <h5 class="fw-bold text-light">Surat Cuti</h5>
      <p class="text-secondary">Buat dan kelola surat cuti</p>
    </div>

    <div class="muichiro-card">
      <div class="card-icon">📊</div>
      <h5 class="fw-bold text-light">Rekap Data</h5>
      <p class="text-secondary">Lihat laporan & statistik</p>
    </div>
  </div>

  <!-- Grafik mini -->
  <div class="chart-container">
    <canvas id="cutiChart"></canvas>
  </div>

  <img src="https://cdn.jsdelivr.net/gh/elyzaassets/muichiro-mini.png" alt="Muichiro" class="muichiro-mini">
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('cutiChart').getContext('2d');

  const data = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
    datasets: [{
      label: 'Jumlah Cuti',
      data: [2, 3, 1, 4, 2, 3],
      backgroundColor: 'rgba(123, 224, 255, 0.5)',
      borderColor: '#7be0ff',
      borderWidth: 2,
      borderRadius: 6
    }]
  };

  const config = {
    type: 'bar',
    data,
    options: {
      responsive: true,
      animation: {
        duration: 1500,
        easing: 'easeOutQuart'
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: { color: 'rgba(255,255,255,0.1)' },
          ticks: { color: '#bff9ff' }
        },
        x: {
          grid: { color: 'rgba(255,255,255,0.1)' },
          ticks: { color: '#bff9ff' }
        }
      },
      plugins: { legend: { display: false } }
    }
  };

  new Chart(ctx, config);
</script>
@endsection
