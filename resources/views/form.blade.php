<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pengaduan - SIPESEK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


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

        .btn-submit {
            background-color: #1f1c8c;
            color: white;
            padding: 10px 40px;
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-submit:hover {
            background-color: #2e2ba6;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center">
        <div></div>
        <img src="logo.png" width="150" height="120" alt="SIPESEK">
    </div>

    <div class="top-divider"></div>

    <p class="fw-semibold text-muted">SMKN 4 KOTA TANGERANG</p>

    <!-- Form Card -->
    <div class="form-container mt-3">
        <h3 class="fw-bold mb-4">Formulir Pengaduan</h3>

        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <!-- Judul -->
            <div class="row mb-4 align-items-center">
                <label class="col-md-2 fw-semibold" @required(true)>Judul Laporan</label>
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="row mb-4">
                <label class="col-md-2 fw-semibold">Deskripsi</label>
                <div class="col-md-8">
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <!-- Tanggal -->
            <div class="row mb-4 align-items-center">
                <label class="col-md-2 fw-semibold">Tanggal</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-submit">
                    Kirim
                </button>
            </div>

        </form>
    </div>

</div>

</body>
</html>
