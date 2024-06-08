<?php
session_start();
include 'Koneksi.php';

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Keranjang</title>
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



    <div class="container">
        <h2 class="text-center">Keranjang Belanja</h2>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($keranjang as $item) {
                    $item_total = $item['harga'] * $item['jumlah'];
                    $total += $item_total;
                    echo "<tr>
                    <td>".$item["id_produk"]."</td>
                    <td>".$item["nama_produk"]."</td>
                    <td>Rp.".$item["harga"]."</td>
                    <td>".$item["jumlah"]."</td>
                    <td>Rp.".$item_total."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <h3>Total Belanja: Rp.<?php echo $total; ?></h3>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
