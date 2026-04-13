<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - SIPESEK</title>
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


        .right-panel {
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            width: 100%;
            max-width: 420px;
        }

        .btn-register {
            background-color: #1f1c8c;
            color: white;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-register:hover {
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


            <h1>WELCOME TO <br> SIPESEK</h1>
            <p>Sistem Pengaduan Sekolah</p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-5 right-panel">
            <div class="register-card">

                <div class="text-center mb-4">
                    <div class=""><img src="logo.png" width="130" height="130" class="position-absolute top-0 end-0" alt="..."></div>
                    <h4 class="mt-3">Daftar</h4>
                    <hr>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-at"></i>
                            </span>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Masukkan email"
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

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   placeholder="Masukkan username"
                                   required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-file"></i>
                            </span>
                        <input type="text" name="jurusan" class="form-control" required>
                    </div>

                    <div class="mb-3 text-center">
                        <hr class="my-3">
                        <small>Sudah memiliki akun?
                            <a href="{{ route('login') }}">Masuk</a>
                        </small>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-register">
                            DAFTAR
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>
