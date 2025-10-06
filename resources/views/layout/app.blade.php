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
      background-color: #121212;
      color: #eaeaea;
      font-family: "Segoe UI", sans-serif;
      overflow-x: hidden;
    }

    /* Sidebar dark */
    .left-sidebar {
      background: #1c1c1c;
      border-right: 1px solid #000 !important;
    }

    .sidebar-nav .sidebar-item a {
      color: #ccc;
      transition: all 0.3s ease;
    }

    .sidebar-nav .sidebar-item a:hover {
      background: #2c2c2c;
      color: #fff;
      border-radius: 8px;
    }

    /* Sidebar section title */
    .sidebar-title {
      font-size: 12px;
      letter-spacing: .5px;
      color: #fff;
      padding-left: 15px;
      margin-top: 10px;
      margin-bottom: 5px;
      display: block;
      text-transform: uppercase;
    }

    /* Navbar */
    .app-header {
      background: #1f1f1f;
      border-bottom: 1px solid #2c2c2c;
    }

    /* Card content animasi */
    .fade-in { opacity: 0; transform: translateY(20px); animation: fadeInUp 0.8s ease forwards; }
    .fade-in:nth-child(1) { animation-delay: 0.2s; }
    .fade-in:nth-child(2) { animation-delay: 0.4s; }
    .fade-in:nth-child(3) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Efek animasi background */
    .bg-animate {
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: -1;
      background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #121212);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Logo kecil bulat */
    .logo-small {
      width: 60px;    /* atur lebar */
      height: 60px;   /* tinggi sama */
      border-radius: 50%; /* bulat */
      object-fit: cover;  /* biar rapih */
    }
  </style>
</head>
<body>
  <div class="bg-animate"></div>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" 
       data-navbarbg="skin6" data-sidebartype="full"
       data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <h4 class="text-white fw-bold m-2">Aplikasi Surat Cuti</h4>
        </a>
      </div>
    </div>

    <!-- Sidebar -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between p-3">
          <a href="{{ url('/dashboard') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logo 1.jpeg') }}" alt="Logo" class="logo-small" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6 text-white"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-title">Home</li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/dashboard') }}"><i class="ti ti-layout-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/pegawai') }}"><i class="ti ti-users"></i><span class="hide-menu">Pegawai</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('cuti.index') }}"><i class="ti ti-calendar"></i><span class="hide-menu">Daftar Cuti</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('rekap.cuti') }}"><i class="ti ti-report"></i><span class="hide-menu">Rekap Cuti</span></a></li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="body-wrapper">
      <!-- Navbar -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                <i class="ti ti-user"></i> {{ Auth::user()->name ?? 'User' }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="ti ti-logout"></i> Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </header>

      <!-- Page Content -->
      <div class="container-fluid px-4 fade-in" style="margin-top: 60px;">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>
