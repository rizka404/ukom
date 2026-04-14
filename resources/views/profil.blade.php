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

        .content-area {
            padding: 40px;
        }

        .card-custom {
            background-color: #e9e9e9;
            border-radius: 10px;
            padding: 30px;
        }

        .badge-selesai {
            background-color: #b7e4c7;
            color: #155724;
        }

        .badge-proses {
            background-color: #f8d7da;
            color: #721c24;
        }

        .table thead {
            background-color: #d6d6d6;
        }
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

            <h3>SISTEM PENGADUAN SEKOLAH</h3>

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


            <p class="text-muted fw-semibold">SMKN 4 KOTA TANGERANG</p>

            <div class="mt-4">
                 <div class="card-custom">
                    <h3 class="fw-bold mb-3">Profil</h3>
<div class="divider mb-4"></div>

<div class="row align-items-center">

    <!-- Data Profil -->
    <div class="col-md-7">
       <form action="{{ route('profil.update') }}" method="POST">
    @csrf

    <div class="row align-items-center">

        <!-- FOTO -->
        <div class="col-md-3 text-center mb-3">
            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center"
                style="width:130px; height:130px; margin:auto;">
                <i class="bi bi-person-fill text-white" style="font-size:60px;"></i>
            </div>
        </div>

        <!-- FORM -->
        <div class="col-md-6">

            <!-- NAMA -->
            <div class="mb-3">
                <label class="fw-semibold">Nama</label>
                <input type="text" name="username"
                    value="{{ $user->username ?? '' }}"
                    class="form-control form-control-sm w-100">
            </div>

            <!-- JURUSAN -->
            <div class="mb-3">
                <label class="fw-semibold">Jurusan</label>
                <input type="text" name="jurusan"
                    value="{{ $user->jurusan ?? '' }}"
                    class="form-control form-control-sm w-100">
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="fw-semibold">Email</label>
                <input type="email" name="email"
                    value="{{ $user->email ?? '' }}"
                    class="form-control form-control-sm w-100">
            </div>

        </div>
    </div>

    <!-- BUTTON -->
    <div class="text-end mt-4">
        <button type="submit" class="btn text-white"
            style="background-color:#f85454; width:120px;">
            Simpan
        </button>
    </div>
</form>
</div>
</body>
</html>
