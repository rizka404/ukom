<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengaduan - SIPESEK</title>
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

        .filter-box {
            background-color: #2e2ba6;
            padding: 15px;
            border-radius: 6px;
            color: white;
        }

        .status-proses {
            background-color: #f8b4b4;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .status-selesai {
            background-color: #b4f8c8;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
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

            <h2 class="fw-bold">Data Pengaduan</h2>

            <!-- FILTER -->
<form method="GET" action="{{ route('admin.pengaduan') }}">
<div class="filter-box mt-4 mb-4">
    <div class="row g-3 align-items-center">

        <div class="col-md-3">
            <label>Status:</label>
            <select name="status" class="form-select">
                <option value="">Semua</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <div class="col-md-5">
            <label>&nbsp;</label>
            <input type="text" name="search" class="form-control" placeholder="Cari laporan...">
        </div>

        <div class="col-md-2">
            <label>&nbsp;</label>
            <button class="btn btn-light w-100">Cari</button>
        </div>

    </div>
</div>
</form>

<!-- TABLE -->
<div class="card">
    <div class="card-header fw-bold">
        <i class="bi bi-file-earmark-text"></i> Detail Laporan
    </div>

    <div class="card-body p-0">
        <table class="table mb-0 text-center">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Pelapor</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>

            @forelse($pengaduans as $p)
            <tr>
                <td>{{ $p->date }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->user->email ?? '-' }}</td>

                <td>
                    <form action="{{ route('admin.pengaduan.updateStatus', $p->id) }}" method="POST">
                        @csrf
                        <select name="status" onchange="this.form.submit()">
                            <option value="proses" {{ $p->status == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $p->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>
                </td>

                <td>
                    <a href="{{ route('pengaduan.show', $p->id) }}">
                        <i class="bi bi-info-circle"></i>
                    </a>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5">Data tidak ada</td>
            </tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>
</div>

</body>
</html>
