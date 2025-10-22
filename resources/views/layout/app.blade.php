<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Aplikasi Surat Cuti')</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <style>
    body {
      background-color: #0a0f12;
      color: #eaeaea;
      font-family: "Segoe UI", sans-serif;
      overflow-x: hidden;
    }

    .left-sidebar {
      background: linear-gradient(180deg, #0b1114 0%, #1b2e34 40%, #2f6e72 100%);
      border-right: 1px solid #000 !important;
    }
    .sidebar-nav .sidebar-item a {
      color: #cfe8e8;
      transition: all 0.3s ease;
    }
    .sidebar-nav .sidebar-item a:hover {
      background: rgba(47, 110, 114, 0.3);
      color: #fff;
      border-radius: 8px;
    }
    .sidebar-title {
      font-size: 12px;
      letter-spacing: .5px;
      color: #aef2f2;
      padding-left: 15px;
      margin-top: 10px;
      margin-bottom: 5px;
      text-transform: uppercase;
    }

    .app-header {
      background: linear-gradient(90deg, #102428, #1c4a4f);
      border-bottom: 1px solid #2c2c2c;
    }

    .fade-in { opacity: 0; transform: translateY(20px); animation: fadeInUp 0.8s ease forwards; }
    .fade-in:nth-child(1) { animation-delay: 0.2s; }
    .fade-in:nth-child(2) { animation-delay: 0.4s; }
    .fade-in:nth-child(3) { animation-delay: 0.6s; }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .bg-animate {
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: -3;
      background: linear-gradient(-45deg, #0a0f12, #133437, #1f7a80, #b0f7f5);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
    }
    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .fog-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 200%;
      height: 200%;
      background: url('https://i.ibb.co/9pXx7Zk/fog.png') repeat;
      opacity: 0.08;
      z-index: -2;
      animation: fogMove 60s linear infinite;
      pointer-events: none;
    }
    @keyframes fogMove {
      0% { transform: translate(0,0); }
      50% { transform: translate(-20%, 10%); }
      100% { transform: translate(0,0); }
    }

    .logo-small {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #66d3d3;
      box-shadow: 0 0 10px rgba(102, 211, 211, 0.5);
    }

    /* Tambahan warna khusus pegawai */
    .pegawai-sidebar {
      background: linear-gradient(180deg, #103035 0%, #1e4b52 40%, #2e7d7f 100%);
    }

    .muichiro-mini {
      position: fixed;
      width: 50px;
      height: 50px;
      background: url('https://i.ibb.co/ZYW3VTp/muichiro-mini.png') no-repeat center/contain;
      pointer-events: none;
      animation: floatMini 8s ease-in-out infinite alternate;
    }
    @keyframes floatMini {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(10deg); }
      100% { transform: translateY(0) rotate(0deg); }
    }
  </style>
</head>
<body>
  <div class="bg-animate"></div>
  <div class="fog-layer"></div>

  {{-- Muichiro animasi --}}
  @for($i = 0; $i < 20; $i++)
    <div class="muichiro-mini"></div>
  @endfor

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" 
       data-navbarbg="skin6" data-sidebartype="full"
       data-sidebar-position="fixed" data-header-position="fixed">

    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <h4 class="text-white fw-bold m-2">Aplikasi Surat Cuti <span style="color:#66d3d3;"></span></h4>
        </a>
      </div>
    </div>

    <!-- Sidebar -->
    <aside class="left-sidebar @if(Auth::check() && Auth::user()->role === 'pegawai') pegawai-sidebar @endif">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between p-3">
          <a href="{{ url('/dashboard') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/10 (2).jpeg') }}" alt="Logo" class="logo-small" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6 text-white"></i>
          </div>
        </div>

        {{-- ===== Sidebar berdasarkan role ===== --}}
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-title">Menu Utama</li>

            {{-- Sidebar Admin --}}
            @if(Auth::check() && Auth::user()->role === 'admin')
              <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/dashboard') }}"><i class="ti ti-layout-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/pegawai') }}"><i class="ti ti-users"></i><span class="hide-menu">Pegawai</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('cuti.index') }}"><i class="ti ti-calendar"></i><span class="hide-menu">Daftar Cuti</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('rekap.cuti') }}"><i class="ti ti-report"></i><span class="hide-menu">Rekap Cuti</span></a></li>
            
            {{-- Sidebar Pegawai --}}
            @elseif(Auth::check() && Auth::user()->role === 'pegawai')
              <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/pegawai-dashboard') }}"><i class="ti ti-layout-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('cuti.create') }}"><i class="ti ti-pencil"></i><span class="hide-menu">Ajukan Cuti</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('cuti.index') }}"><i class="ti ti-list"></i><span class="hide-menu">Daftar Cuti</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('rekap.cuti') }}"><i class="ti ti-clipboard-data"></i><span class="hide-menu">Rekap Cuti</span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('pegawai.profile') }}"><i class="ti ti-user"></i><span class="hide-menu">Profil Pegawai</span></a></li>
            @endif
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <ul class="navbar-nav ms-auto">
            @if(Auth::check() && Auth::user()->role === 'pegawai')
              <li class="nav-item me-3">
                <span class="badge bg-info text-dark p-2">Status: Pegawai</span>
              </li>
            @endif

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                <i class="ti ti-user"></i> {{ Auth::user()->nama ?? 'User' }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                @if(Auth::check() && Auth::user()->role === 'pegawai')
                  <li><a class="dropdown-item" href="{{ route('pegawai.profile') }}"><i class="ti ti-id"></i> Profil</a></li>
                @endif
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                      <i class="ti ti-logout"></i> Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </header>

      <div class="container-fluid px-4 fade-in" style="margin-top: 60px;">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>
