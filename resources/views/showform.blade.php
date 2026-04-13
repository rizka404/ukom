<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pengaduan - SIPESEK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f4;
        }

        .top-divider {
            height: 1px;
            background-color: #999;
            margin: 20px 0 30px 0;
        }

        .form-container {
            background-color: #e9e9e9;
            padding: 40px;
            border-radius: 6px;
        }

        .form-control,
        .form-control:focus {
            background-color: #f5f5f5;
            border: none;
            box-shadow: none;
        }

        textarea.form-control {
            resize: none;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center">
        <div></div>
        <img src="{{ asset('logo.png') }}" width="150" height="120" alt="SIPESEK">
    </div>

    <div class="top-divider"></div>

    <p class="fw-semibold text-muted">SMKN 4 KOTA TANGERANG</p>

    <!-- Form Card -->
    <div class="form-container mt-3">
        <h3 class="fw-bold mb-4">Detail Pengaduan</h3>

        <!-- Judul -->
        <div class="row mb-4 align-items-center">
            <label class="col-md-2 fw-semibold">Judul Laporan</label>
            <div class="col-md-4">
                <input type="text"
                       class="form-control"
                       value="{{ $pengaduan->title }}"
                       readonly>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="row mb-4">
            <label class="col-md-2 fw-semibold">Deskripsi</label>
            <div class="col-md-8">
                <textarea rows="5"
                          class="form-control"
                          readonly>{{ $pengaduan->description }}</textarea>
            </div>
        </div>

        <!-- Tanggal -->
        <div class="row mb-4 align-items-center">
            <label class="col-md-2 fw-semibold">Tanggal</label>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="date"
                           class="form-control"
                           value="{{ $pengaduan->created_at->format('Y-m-d') }}"
                           readonly>
                    <span class="input-group-text bg-white border-0">
                        <i class="bi bi-calendar"></i>
                    </span>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="row mb-4 align-items-center">
            <label class="col-md-2 fw-semibold">Status</label>
            <div class="col-md-4">
                <input type="text"
                       class="form-control"
                       value="{{ ucfirst($pengaduan->status) }}"
                       readonly>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </div>

</div>

</body>
</html>
