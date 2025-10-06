<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
</head>
<body>
  <div class="container mt-5">
    <h1>Selamat datang, {{ auth()->user()->username }}</h1>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
  </div>
</body>
</html>
