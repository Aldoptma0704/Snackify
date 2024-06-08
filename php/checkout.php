<?php
session_start();
include 'Koneksi.php';

if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
    header('Location: index.php');
    exit;
}

$keranjang = $_SESSION['keranjang'];

// Proses pesanan
foreach ($keranjang as $item) {
    $id_produk = $item['id_produk'];
    $jumlah = $item['jumlah'];
    
    // Kurangi stok dari database
    $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE id_produk = '$id_produk'");
}

// Kosongkan keranjang
unset($_SESSION['keranjang']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Checkout</title>
</head>
<body>
<nav class="navbar navbar-expand-lg text-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">SNACKIFY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="beliproduk.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Riwayat</a>
        </ul>
        </div>
    </div>
    </nav>


    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h2 class="text-center">Checkout Berhasil</h2>
        <img src="../img/buyer.png" alt="Pembayaran berhasil" style="max-width: 40%;">
        <p>Terima kasih telah berbelanja!</p>
        <a href="beliproduk.php" class="btn btn-primary">Kembali ke Daftar Produk</a>
    </div>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
