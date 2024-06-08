<?php
session_start();
include 'Koneksi.php';

// Mengecek apakah admin telah login
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Ambil semua orders dari database untuk ditampilkan di daftar orders
$orders_result = $conn->query("SELECT orders.*, produk.nama_produk FROM orders JOIN produk ON orders.product_id = produk.id_produk");
$orders = $orders_result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h2>Admin Panel</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="#add-order" class="nav-link">Tambah Order</a></li>
                        <li class="nav-item"><a href="#order-list" class="nav-link">Daftar Order</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header>
                    <h1>Selamat Datang, Admin!</h1>
                </header>
                <section id="home">
                    <p>Ini adalah halaman utama admin. Pilih tindakan dari menu di sebelah kiri.</p>
                </section>
                <section id="add-order" class="hidden">
                    <h2>Tambah Order Baru</h2>
                    <form id="add-order-form" method="POST" action="">
                        <div class="mb-3">
                            <label for="customer-name" class="form-label">Nama Pelanggan:</label>
                            <input type="text" class="form-control" id="customer-name" name="customer_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="product-id" class="form-label">Produk:</label>
                            <select class="form-control" id="product-id" name="product_id" required>
                                <?php
                                // Ambil daftar produk dari database untuk opsi pilihan
                                $product_result = $conn->query("SELECT id_produk, nama_produk FROM produk");
                                while ($product = $product_result->fetch_assoc()) {
                                    echo "<option value='{$product['id_produk']}'>{$product['nama_produk']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="order-date" class="form-label">Tanggal Order:</label>
                            <input type="date" class="form-control" id="order-date" name="order_date" required>
                        </div>
                        <button type="submit" name="add_order" class="btn btn-primary">Tambah Order</button>
                    </form>
                </section>
                <section id="order-list" class="hidden">
                    <h2>Daftar Order</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Tanggal Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orders as $order) {
                                echo "<tr>";
                                echo "<td>{$order['order_id']}</td>";
                                echo "<td>{$order['customer_name']}</td>";
                                echo "<td>{$order['nama_produk']}</td>";
                                echo "<td>{$order['quantity']}</td>";
                                echo "<td>{$order['order_date']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="scripts.js" defer></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
