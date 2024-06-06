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

    <nav class="navbar navbar-expand-lg text-light bg-light">
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
            <a class="nav-link" href="#">Riwayat</a>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-5 mt-3">Daftar Pengguna Sneckify</h2>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM users");
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["id_users"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["email"]."</td>
                    <td>
                    <a href='delete_users.php?id_users=".$row["id_users"]."'>Delete</a>
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