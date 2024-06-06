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
    <div class="container">
        <h2 class="text-center">Checkout Berhasil</h2>
        <p>Terima kasih telah berbelanja!</p>
        <a href="index.php" class="btn btn-primary">Kembali ke Daftar Produk</a>
    </div>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
