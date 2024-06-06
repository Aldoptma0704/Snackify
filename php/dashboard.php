<?php include 'Koneksi.php' ; ?>
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
    <p>hp</p>

    <div class="container">
        <h2 class="text-center">Daftar Produk</h2>
        <a href="tambah_produk.php" class="btn btn-success mb-3">Tambah Produk</a>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
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
                    <td>
                    <a href='update.php?id_produk=".$row["id_produk"]."'>Edit</a>
                    <a href='delete.php?id_produk=".$row["id_produk"]."'>Delete</a>
                </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
       <!-- Bootsrap 5 -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>