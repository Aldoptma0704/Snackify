<?php include 'Koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">SNACKIFY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm" aria-current="page" href="Login.php">Login/Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-4">
    <div class="alert alert-info text-center" role="alert">
        <h4 class="alert-heading">Selamat Datang di SNACKIFY!</h4>
        <p>Untuk mengakses semua fitur, harap <a href="Login.php" class="alert-link">login</a> atau <a href="Register.php" class="alert-link">register</a> terlebih dahulu.</p>
    </div>

    <h2 class="text-center mb-4">Daftar Produk</h2>

    <div class="d-flex justify-content-center">
        <img src="../img/snack.png" alt="Produk Kami" class="img-fluid mb-4" style="max-width: 30%;">
    </div>

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM produk");
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["id_produk"]."</td>
                <td>".$row["nama_produk"]."</td>
                <td>Rp.".$row["harga"]."</td>
                <td>".$row["stok"]."</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
