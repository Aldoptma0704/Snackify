<?php
session_start();
include 'Koneksi.php';

$id_produk = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];

// Ambil detail produk dari database
$result = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$product = $result->fetch_assoc();

if ($product) {
    $item = [
        'id_produk' => $product['id_produk'],
        'nama_produk' => $product['nama_produk'],
        'harga' => $product['harga'],
        'jumlah' => $jumlah
    ];

    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }

    $_SESSION['keranjang'][] = $item;

    $_SESSION['notifikasi'] = "Produk Berhasil ditambahkan ke keranjang";
}else{
    $_SESSION['notifikasi'] = "Produk tidak ditemukan";
}

header('Location: beliproduk.php');
exit();
?>
