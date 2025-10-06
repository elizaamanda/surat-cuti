<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Your App</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <style>
    body {
      background: url("{{ asset('assets/images/4.jpeg') }}") no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 15px;
    }

    .login-card {
      background: rgba(0, 0, 0, 0.6);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.8);
      max-width: 400px;
      width: 100%;
      backdrop-filter: blur(8px);
      color: #fff;
    }

    .login-card h3 { color: #fff; font-size: 1.8rem; }
    .login-card p { color: #ddd; font-size: 0.95rem; }

    .form-label { color: #fff; font-weight: 600; }

    .form-control {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #ccc;
      color: #fff;
    }
    .form-control::placeholder { color: #ddd; }

    .btn-dark { background-color: #000; border: none; }
    .btn-dark:hover { background-color: #333; }

    @media (max-width: 480px) {
      .login-card { padding: 20px; }
      .login-card h3 { font-size: 1.5rem; }
      .login-card p { font-size: 0.9rem; }
    }
  </style>
</head>

<body>
  <div class="login-card text-center">
    <h3 class="fw-bold mb-2">Selamat Datang</h3>
    <p class="mb-4">Silakan login untuk masuk ke dashboard</p>

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
