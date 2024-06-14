<?php
include 'Koneksi.php';

if (isset($_GET['id'])){
    $id_produk = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id_produk);
    if ($stmt->execute()){
        echo "Akun user berhasil dihapus";
    }else{
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
header("Location: user.php");
exit;
?>