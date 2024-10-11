<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD ADMIN</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #555;
            padding: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #333;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>DASHBOARD ADMIN</h1>
    </header>

    <nav>
        <a href="<?php echo base_url('adminor/surat') ?>">SURAT MASUK</a>
        <a href="<?php echo base_url('adminor/surat_kel') ?>">SURAT KELUAR</a>
        <a href="<?php echo base_url('adminor/surat_kep') ?>">SURAT KEPUTUSAN</a>
        <a href="<?php echo base_url('adminor/notulensi') ?>">NOTULENSI</a>
        <a href="#">DAFTAR DAN SERTIFIKAT WAKAF</a>
        <a href="#">SURAT AKTIF ORGANISASI</a>
    </nav>

    <div class="container">
        <div class="card">
            <h2>SURAT MASUK</h2>
            <!-- Add content as needed -->
        </div>

        <div class="card">
            <h2>SURAT KELUAR</h2>
            <!-- Add content as needed -->
        </div>

        <div class="card">
            <h2>SURAT KEPUTUSAN</h2>
            <!-- Add content as needed -->
        </div>

        <div class="card">
            <h2>NOTULENSI</h2>
            <!-- Add content as needed -->
        </div>

        <div class="card">
            <h2>DAFTAR DAN SERTIFIKAT WAKAF</h2>
            <!-- Add content as needed -->
        </div>

        <div class="card">
            <h2>SURAT AKTIF ORGANISASI</h2>
            <!-- Add content as needed -->
        </div>
    </div>
</body>

</html>