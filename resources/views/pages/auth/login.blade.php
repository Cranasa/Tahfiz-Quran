<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>

    <link rel="shortcut icon" href="/mazer/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/auth.css">

    {{-- Toastify --}}
    <link rel="stylesheet" href="/mazer/assets/extensions/toastify-js/src/toastify.css">
</head>

<body>
    <script src="/mazer/assets/static/js/initTheme.js"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="/img/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Login</h1>
                    <p class="auth-subtitle mb-5">Masuk menggunakan akun terdaftar.</p>

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" value="{{ old('email') }}"
                                name="email" placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" value="{{ old('password') }}"
                                class="form-control form-control-xl" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat saya
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    {{-- Toastify --}}
  <script src="/mazer/assets/extensions/toastify-js/src/toastify.js"></script>
  @if (session()->has('warning'))
    <script>
        Toastify({
          text: "{{ session('warning') }}",
          duration: 3000,
          close: true,
          gravity: "top",
          position: "left",
          backgroundColor: "#ffc107",
        }).showToast();
    </script>
  @endif

</body>


</html>
