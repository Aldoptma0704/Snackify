<?php
session_start();
include 'Koneksi.php';

// Ambil data riwayat transaksi dari database
$result = $conn->query("SELECT rt.*, p.nama_produk 
                        FROM riwayat_transaksi rt
                        JOIN produk p ON rt.id_produk = p.id_produk
                        ORDER BY rt.tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Riwayat Belanja User</title>
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
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="riwayatbelanjaadmin.php">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback_admin.php">Feedback</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    
<div class="container">
    <h2 class="text-center my-4">Riwayat Pembelian User</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-primary text-center">
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr class="text-center">
                    <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                    <td><?php echo htmlspecialchars($row['jumlah']); ?></td>
                    <td><?php echo 'Rp ' . number_format($row['harga'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
