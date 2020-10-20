<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Portal edukasi dengan model Reciprocal Teaching</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style/assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('style/assets/css/login.css')}}">
  <link rel="icon" href="{{ asset('style/assets/images/logo2.svg') }}" type="image/x-icon">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('style/assets/images/illustration/9 SCENE.svg') }}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="{{ asset('style/assets/images/logo.svg') }}" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Silahkan login :))</p>
              <form action="{{ route('user.login.submit') }}" method="POST">
                  @csrf
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block login-btn mb-4">
                      {{ __('Masuk') }}
                  </button>
                </div>              
              </form>
              <p class="login-card-footer-text">Belum punya akun? <a href="{{ route('siswa.register') }}" class="text-reset">Yukk daftar !</a></p>
			      </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="{{ asset('style/assets/js/plugins/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins/bootstrap.min.js') }}"></script>
</body>
</html>
