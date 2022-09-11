
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card-body">
      <form action="{{ url('login/proses') }}" method="post" 
      class="d-flex flex-column justify-content-center align-items-center login-box" style="height: 100vh">
        <img class="image mb-5" src="../../img/logo.png" alt="Logo" width="500">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control rounded-pill
          @error('email')
              is-invalid
          @enderror
          " name="email" placeholder="Email" value="{{ old('email') }}" autofocus autocomplete="off" required>
          <div class="input-group-append"></div>
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control rounded-pill
          @error('password')
            is-invalid
          @enderror
          " name="password" placeholder="Password" required>
          <div class="input-group-append"></div>
          @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="social-auth-links text-center mb-3 w-100">
            <button type="submit" class="btn btn-dark btn-block rounded-pill">Login</button>
        </div>
      </form>
  </div>

<!-- jQuery -->
<script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>
</html>
