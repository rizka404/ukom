<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SIPESEK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
        }

        .left-panel {
            background: linear-gradient(135deg, #2e2ba6, #1f1c8c);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            position: relative;
        }

        .left-panel h1 {
            font-weight: 700;
            font-size: 42px;
        }

        .left-panel p {
            font-size: 18px;
        }

        .shape {
            position: absolute;
            width: 180px;
            opacity: 0.4;
        }

        .shape.top {
            top: 40px;
            left: 60px;
        }

        .shape.bottom {
            bottom: 40px;
            right: 80px;
        }

        .right-panel {
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
        }

        .btn-login {
            background-color: #1f1c8c;
            color: white;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #2e2ba6;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #1f1c8c;
        }

        @media (max-width: 768px) {
            .left-panel {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid h-100">
    <div class="row h-100">

        <!-- LEFT SIDE -->
        <div class="col-md-7 left-panel">
            <img src="{{ asset('images/triangle1.png') }}" class="shape top" alt="">
            <img src="{{ asset('images/triangle2.png') }}" class="shape bottom" alt="">

            <h1>WELCOME TO <br> SIPESEK</h1>
            <p>Sistem Pengaduan Sekolah</p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-5 right-panel">
            <div class="login-card">

                <div class="text-center mb-4">
                    <div class=""><img src="logo.png" width="130" height="130" class="position-absolute top-0 end-0" alt="..."></div>
                    <h4 class="mt-3">Masuk</h4>
                    <hr>
                </div>

               <form method="POST" action="{{ route('login.process') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email/Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text"
                                   name="email"
                                   class="form-control"
                                   placeholder="Masukkan email atau username"
                                   required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-eye-slash"></i>
                            </span>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   required>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <hr class="my-3">
                        <small>Belum memiliki akun?
                            <a href="{{ route('register') }}">Daftar</a>
                        </small>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-login">
                            MASUK
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>
