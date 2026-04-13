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


            <p class="text-muted fw-semibold">SMKN 4 KOTA TANGERANG</p>

            <div class="mt-4">
                 <div class="card-custom">
                    <h3>INFORMASI LAPORAN</h3>

                <table class="table align-justify ">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Informasi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
@foreach($pengaduans as $item)
    <tr>
        <td>{{ $item->created_at->format('d/m/Y') }}</td>

        <td>
            @if($item->status == 'selesai')
                <span class="badge badge-selesai">LAPORAN SELESAI</span>
            @elseif($item->status == 'proses')
                <span class="badge badge-proses">LAPORAN SEDANG DIPROSES</span>
            @else
                <span class="badge bg-secondary">VERIFIKASI LAPORAN</span>
            @endif
        </td>

        <td>
            <a href="{{ route('pengaduan.show', $item->id) }}">
                <img src="{{ asset('info.png') }}" height="30">
            </a>
        </td>
    </tr>
@endforeach
</tbody>
                </table>

            </div>
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
