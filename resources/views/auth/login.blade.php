<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login </title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <style>
    /* Body dan Background */
    body {
      background: url('{{ asset("assets/images/logo 1.jpeg") }}') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 15px;
      overflow: hidden;
      position: relative;
    }

    /* Tambahan kabut animasi */
    .fog-layer {
      position: absolute;
      top: 0;
      left: 0;
      width: 200%;
      height: 200%;
      background: url('https://i.ibb.co/9pXx7Zk/fog.png') repeat;
      opacity: 0.08;
      z-index: 1;
      animation: fogMove 60s linear infinite;
      pointer-events: none;
    }

    @keyframes fogMove {
      0% { transform: translate(0,0); }
      50% { transform: translate(-20%, 10%); }
      100% { transform: translate(0,0); }
    }

    /* Login Card */
    .login-card {
      background: rgba(0, 50, 55, 0.7); /* semi-transparan hijau biru */
      border-radius: 20px;
      padding: 35px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.9);
      max-width: 400px;
      width: 100%;
      backdrop-filter: blur(8px);
      color: #e0f7f7;
      position: relative;
      z-index: 2;
      border: 2px solid #66d3d3; /* warna rambut Muichiro */
    }

    .login-card h3 { 
      color: #aef2f2; 
      font-size: 2rem; 
      margin-bottom: 10px;
    }

    .login-card p { 
      color: #cfe8e8; 
      font-size: 1rem; 
      margin-bottom: 25px;
    }

    .form-label { 
      color: #cfe8e8; 
      font-weight: 600; 
    }

    .form-control {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #66d3d3; /* warna aksen Muichiro */
      color: #fff;
    }
    .form-control::placeholder { color: #cfe8e8; }

    .btn-dark { 
      background-color: #1f7a80; 
      border: 1px solid #66d3d3; 
      color: #e0f7f7;
      font-weight: 600;
    }
    .btn-dark:hover { 
      background-color: #0f4e55; 
      border-color: #aef2f2; 
    }

    @media (max-width: 480px) {
      .login-card { padding: 25px; }
      .login-card h3 { font-size: 1.6rem; }
      .login-card p { font-size: 0.95rem; }
    }

    /* Muichiro mini floating */
    .muichiro-mini {
      position: absolute;
      width: 40px;
      height: 40px;
      background: url('https://i.ibb.co/ZYW3VTp/muichiro-mini.png') no-repeat center/contain;
      animation: floatMini 8s ease-in-out infinite alternate;
      pointer-events: none;
      z-index: 2;
    }

    @keyframes floatMini {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-15px) rotate(10deg); }
      100% { transform: translateY(0) rotate(0deg); }
    }

    .muichiro-mini:nth-child(1) { top: 10%; left: 5%; animation-duration: 6s; }
    .muichiro-mini:nth-child(2) { top: 20%; left: 80%; animation-duration: 7s; }
    .muichiro-mini:nth-child(3) { top: 50%; left: 40%; animation-duration: 8s; }
    .muichiro-mini:nth-child(4) { top: 70%; left: 60%; animation-duration: 9s; }
  </style>
</head>

<body>
  <div class="fog-layer"></div>

  <!-- Muichiro mini floating -->
  <div class="muichiro-mini"></div>
  <div class="muichiro-mini"></div>
  <div class="muichiro-mini"></div>
  <div class="muichiro-mini"></div>

  <div class="login-card text-center">
    <h3 class="fw-bold">Selamat Datang</h3>
    <p>Silakan login untuk masuk ke dashboard</p>

    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <div class="mb-3 text-start">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
        @error('username')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3 text-start">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-dark">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
