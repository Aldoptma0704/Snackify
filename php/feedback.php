<?php
session_start();
include 'Koneksi.php';

$feedback_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'], $_POST['kritik'], $_POST['saran'])) {
        $user_id = $_SESSION['user_id'];
        $kritik = htmlspecialchars($_POST['kritik'], ENT_QUOTES, 'UTF-8');
        $saran = htmlspecialchars($_POST['saran'], ENT_QUOTES, 'UTF-8');

        // Insert feedback into the database
        $stmt = $conn->prepare("INSERT INTO feedback (user_id, kritik, saran) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $kritik, $saran);

        if ($stmt->execute()) {
            $feedback_message = "Feedback berhasil dikirim.";
        } else {
            $feedback_message = "Terjadi kesalahan saat mengirim feedback: " . $conn->error;
        }

        $stmt->close();
    } else {
        $feedback_message = "Semua field harus diisi.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Feedback</title>
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
            <a class="nav-link" href="riwayatbelanja.php">Riwayat</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="feedback.php">Feedback</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container">
        <h2 class="text-center my-4">Kritik dan Saran</h2>

        <?php if ($feedback_message): ?>
            <div class="alert alert-info">
                <?php echo $feedback_message; ?>
            </div>
        <?php endif; ?>

        <form action="feedback.php" method="post">
            <div class="mb-3">
                <label for="kritik" class="form-label">Kritik</label>
                <textarea name="kritik" id="kritik" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="saran" class="form-label">Saran</label>
                <textarea name="saran" id="saran" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
