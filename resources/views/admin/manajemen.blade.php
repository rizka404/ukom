<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pengguna - SIPESEK</title>
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

            <h2 class="fw-bold">Manajemen pengguna</h2>

            <!-- SEARCH -->
            <form method="GET" action="{{ route('admin.manajemen') }}">
            <div class="row g-2">
                <div class="col-md-10">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari pengguna..."
                   value="{{ $search }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-light w-100">Cari</button>
            </div>
         </div>

        </form>
            <!-- DETAIL PENGGUNA -->
            <div class="card">
                <div class="card-header fw-bold">
                    <i class="bi bi-people-fill"></i> Detail pengguna
                </div>

                <div class="card-body p-0">
                    <table class="table mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                        <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if($user->role == 'admin')
                     <span class="badge bg-danger">Admin</span>
                    @else
                     <span class="badge bg-primary">Siswa</span>
                    @endif
                    </td>
                    <td>
                    <a href="#">
                    <i class="bi bi-info-circle"></i>
                    </a>
                    </td>
                </tr>
                @empty
            <tr>
                <td colspan="4">Tidak ada data</td>
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
