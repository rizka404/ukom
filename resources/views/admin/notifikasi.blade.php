<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi - SIPESEK</title>
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

        .search-box {
            background-color: #2e2ba6;
            padding: 15px;
            border-radius: 6px;
        }

        .notif-item {
            background-color: #e9e9e9;
            padding: 15px 20px;
            border-bottom: 1px solid #cfcfcf;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notif-item:last-child {
            border-bottom: none;
        }

        .notif-container {
            border: 1px solid #cfcfcf;
            border-radius: 5px;
            overflow: hidden;
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

        <!-- SIDEBAR (TIDAK DIUBAH) -->
        <div class="col-md-3 col-lg-2 sidebar">

            <div class="position-relative d-inline-block mb-3">
                <img src="{{ asset('user.png') }}" class="profile-img">
                <span class="notif-badge">
                    {{ $pengaduans->count() }}
                </span>
            </div>

            <h5 class="mb-0">Admin</h5>
            <small class="text-light">admin@email.com</small>

            <div class="menu mt-5">
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                   Dashboard
                </a>

                <a href="{{ route('admin.pengaduan') }}"
                   class="{{ request()->routeIs('admin.pengaduan') ? 'active' : '' }}">
                   Data Pengaduan
                </a>

                <a href="{{ route('admin.manajemen') }}"
                   class="{{ request()->routeIs('admin.manajemen') ? 'active' : '' }}">
                   Manajemen pengguna
                </a>

                <a href="{{ route('admin.notifikasi') }}"
                   class="{{ request()->routeIs('admin.notifikasi') ? 'active' : '' }}">
                   Notifikasi
                </a>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="col-md-9 col-lg-10 main-content">

            <div class="d-flex justify-content-end mb-4">
                <img src="{{ asset('logo.png') }}" width="150"
                     class="position-absolute top-0 end-0" alt="SIPESEK">
            </div>
            <br>

            <div class="divider"></div>
            <h2 class="fw-bold">Notifikasi</h2>

            <!-- SEARCH -->
            <div class="search-box mt-4 mb-4">
                <div class="row g-2">
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Cari notifikasi...">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-light w-100">Cari</button>
                    </div>
                </div>
            </div>

            <!-- NOTIFICATION LIST -->
            <div class="notif-container">

                @foreach($pengaduans as $p)
            <div class="notif-item">
            <span>
                @if($p->status == 'proses')
                Laporan "{{ $p->title }}" sedang diproses.
                @elseif($p->status == 'selesai')
                Laporan "{{ $p->title }}" telah selesai.
                @else
                Laporan baru "{{ $p->title }}" diterima.
                @endif
            </span>
            <i class="bi bi-bell"></i>
            </div>
                @endforeach
</div>
        </div>
    </div>
</div>
</body>
</html>
