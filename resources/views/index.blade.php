<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Sistem Cuti</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <!-- Sidebar + Navbar wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical"
       data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed"
       data-header-position="fixed">

    <!-- Sidebar -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/logo.svg') }}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
               id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar Nav -->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('dashboard') }}">
                <span><i class="ti ti-layout-dashboard"></i></span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('pegawai.index') }}">
                <span><i class="ti ti-user"></i></span>
                <span class="hide-menu">Pegawai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('cuti.index') }}">
                <span><i class="ti ti-calendar"></i></span>
                <span class="hide-menu">Cuti</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- End Sidebar -->

    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Navbar -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-danger btn-sm">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- End Navbar -->

      <div class="container-fluid">
        <!-- Page Title -->
        <div class="card bg-light mb-4">
          <div class="card-body">
            <h3 class="mb-0">Selamat Datang di Dashboard</h3>
            <p class="mb-0">Sistem Informasi Manajemen Pengajuan Cuti</p>
          </div>
        </div>

        <!-- Konten Dashboard -->
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Pegawai</h5>
                <p class="card-text display-6">{{ \App\Models\Pegawai::count() }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Cuti</h5>
                <p class="card-text display-6">{{ \App\Models\Cuti::count() }}</p>
              </div>
            </div>
          </div>
          <!-- Tambahkan widget lain sesuai kebutuhan -->
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
