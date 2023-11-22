<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tautan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .center-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengisi seluruh tinggi viewport */
        }
        .custom-container {
            background-color: black; /* Mengubah warna latar belakang menjadi hitam */
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); /* Efek bayangan */
            padding: 20px;
            border-radius: 10px;
            color: white; /* Mengubah warna teks menjadi putih */
        }
    </style>
</head>
<body>
    <div class="container-fluid center-content">
        <div class="custom-container">
           
            <h4>SELAMAT DATANG DI HALAMAN DASHBOARD TOKO BUNGA WANGI</h4>
            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <div class="col-auto">
                    <form action="{{ route('tokobunga2s.home') }}" method="get">
                        <button type="submit" class="btn btn-primary">Login Admin</button>
                    </form>
                </div>
                <div class="col-auto">
                    <form action="{{ route('tokobunga2s.homeuser') }}" method="get">
                        <button type="submit" class="btn btn-secondary">Pengunjung</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tautan JavaScript Bootstrap (Opsional, hanya jika Anda memerlukannya) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
