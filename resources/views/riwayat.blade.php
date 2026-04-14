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
                    <h3>STATUS PENGADUAN</h3>

                <table class="table align-justify ">
                    <thead>
                        <tr>
                            <th scope="col">Judul Pengaduan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduans as $pengaduan)
                        <tr>
                             <td>{{ $pengaduan->title }}</td>
                              <td>{{ $pengaduan->date }}</td>
                            <td>
                                <span class="badge badge-selesai">Selesai</span>
                            </td>
                            <td> <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-sm"> <img src="info.png" height="30" alt=""></a></td>
                        </tr>
                        @empty
                                    <div class="alert alert-danger">
                                        Pengaduan belum Tersedia.
                                    </div>
                                @endforelse
                    </tbody>
                </table>
                {{ $pengaduans->links() }}
            </div>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
