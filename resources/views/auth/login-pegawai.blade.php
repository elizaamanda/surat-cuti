<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Pegawai</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #007bff, #00c6ff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card p-4">
          <div class="card-body">
            <h3 class="text-center mb-4">Login Pegawai</h3>

            {{-- Pesan sukses / gagal --}}
            @if(session('success'))
              <div class="alert alert-success text-center">
                {{ session('success') }}
              </div>
            @endif
            @if($errors->any())
              <div class="alert alert-danger text-center">
                {{ $errors->first() }}
              </div>
            @endif

            {{-- Form login --}}
            <form method="POST" action="{{ route('login.process') }}">
              @csrf

              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  id="username"
                  name="username"
                  class="form-control @error('username') is-invalid @enderror"
                  value="{{ old('username') }}"
                  placeholder="Masukkan username"
                  required
                  autofocus
                >
                @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="form-control @error('password') is-invalid @enderror"
                  placeholder="Masukkan password"
                  required
                >
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
            </form>

            <p class="text-center text-muted mt-3 mb-0" style="font-size: 0.9rem;">
              © {{ date('Y') }} Aplikasi Surat Cuti
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
