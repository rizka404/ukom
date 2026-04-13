<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SIPESEK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, #2e2ba6, #1f1c8c);
            color: white;
            padding: 30px 20px;
        }

        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
        }

        .notif-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            font-size: 10px;
            padding: 3px 6px;
            border-radius: 50%;
        }

        .menu a {
            display: block;
            color: #dcdcdc;
            text-decoration: none;
            padding: 10px 0;
            font-weight: 500;
        }

        .menu a.active,
        .menu a:hover {
            color: white;
            font-weight: 600;
        }

        .main-content {
            padding: 40px;
        }

        .divider {
            height: 1px;
            background-color: #bfbfbf;
            margin: 20px 0;
        }

        .btn-complaint {
            background-color: #5b4bcc;
            color: white;
            font-weight: 600;
            padding: 15px;
            border-radius: 6px;
            font-size: 18px;
        }

        .btn-complaint:hover {
            background-color: #4a3bb3;
            color: white;
        }

        @media (max-width: 768px) {
            .sidebar {
                height: auto;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 sidebar">

            <div class="position-relative d-inline-block mb-3">
                <img src="user.png" class="profile-img">
                <span class="notif-badge">4</span>
            </div>

            <h5 class="mb-0">Felica</h5>
            <small class="text-light">felica@email.com</small>

            <div class="menu mt-5">
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                   Dashboard
                </a>

                <a href="{{ route('riwayat') }}"
                   class="{{ request()->routeIs('riwayat') ? 'active' : '' }}">
                   Riwayat
                </a>

                <a href="{{ route('info') }}"
                   class="{{ request()->routeIs('info') ? 'active' : '' }}">
                   Info
                </a>

                <a href="{{ route('profil') }}"
                   class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                   Profil
                </a>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="col-md-9 col-lg-10 main-content">

            <div class="d-flex justify-content-end mb-4">
                <img src="logo.png" width="150"
                     class="position-absolute top-0 end-0" alt="SIPESEK">
            </div>

            <br>

            <div class="divider"></div>

            <h2 class="fw-bold">Selamat Datang, Felica</h2>
            <p class="text-muted fw-semibold">SMKN 4 KOTA TANGERANG</p>

            <div class="mt-4">
                <a href="{{ route('form') }}" class="btn btn-complaint w-100">
                    <i class="bi bi-plus-lg"></i> Buat Pengaduan
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
