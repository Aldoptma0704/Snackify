<?php
include 'Koneksi.php';

if (isset($_GET['id_users'])){
    $id_produk = $_GET['id_users'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id_users = ?");
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