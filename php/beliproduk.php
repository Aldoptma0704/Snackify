<?php include 'Koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Produk</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Daftar Produk</h2>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM produk");
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <form action='tambah_keranjang.php' method='post'>
                    <td>".$row["id_produk"]."</td>
                    <td>".$row["nama_produk"]."</td>
                    <td>Rp.".$row["harga"]."</td>
                    <td>".$row["stok"]."</td>
                    <td><input type='number' name='jumlah' min='1' max='".$row["stok"]."' class='form-control' required></td>
                    <td>
                        <input type='hidden' name='id_produk' value='".$row["id_produk"]."'>
                        <button type='submit' class='btn btn-primary'>Tambah ke Keranjang</button>
                    </td>
                    </form>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="keranjang.php" class="btn btn-success">Lihat Keranjang</a>
    </div>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
