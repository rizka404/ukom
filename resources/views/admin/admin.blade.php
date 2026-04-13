<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SIPESEK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #f2f2f2;
        }

        /* Sidebar */
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

        /* Main */
        .main-content {
            padding: 40px;
        }

        .divider {
            height: 1px;
            background-color: #bfbfbf;
            margin: 20px 0;
        }

        .stat-card {
            background-color: #1f1c8c;
            color: white;
            border-radius: 6px;
            padding: 20px;
        }

        .stat-card h3 {
            font-weight: bold;
        }

        .box {
            background-color: #e6e6e6;
            border-radius: 6px;
            padding: 15px;
        }

        .table thead {
            background-color: #d0d0d0;
        }

        .badge-proses {
            background-color: #f8d7da;
            color: #842029;
        }

        .badge-selesai {
            background-color: #b7e4c7;
            color: #155724;
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
                <img src="{{ asset('user.png') }}" class="profile-img">
                <span class="notif-badge">4</span>
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
                   Manajemen Pengguna
                </a>

                <a href="{{ route('admin.notifikasi') }}"
                   class="{{ request()->routeIs('admin.notifikasi') ? 'active' : '' }}">
                   Notifikasi
                </a>

            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="col-md-9 col-lg-10 main-content">

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold">Dashboard</h2>
                <img src="{{ asset('logo.png') }}" width="150">
            </div>

            <div class="divider"></div>

            <!-- Statistik -->
            <div class="row mb-4">

                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <p>Total laporan</p>
                        <h3>{{ $total }}</h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <p>Dalam proses</p>
                        <h3>{{ $proses }}</h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <p>Laporan selesai</p>
                        <h3>{{ $selesai }}</h3>
                    </div>
                </div>

            </div>

            <!-- Table -->
            <div class="row">

                <!-- Laporan -->
                <div class="col-md-8">
                    <div class="box">
                        <h5 class="mb-3"><i class="bi bi-file-earmark-text"></i> Laporan</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach ($pengaduans as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->status == 'verifikasi')
                                <span class="badge badge-proses">Proses</span>
                                @else
                                 <span class="badge badge-selesai">Selesai</span>
                                @endif
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
