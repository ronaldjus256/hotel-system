<?php
include 'config/db.php';

$result = mysqli_query($conn, "SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Kamar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Kamar</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['name']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
                    <p>Fasilitas: <?= htmlspecialchars($row['facilities']); ?></p>
                    <p>Harga: Rp. <?= number_format($row['price'], 2); ?> / malam</p>
                    <a href="booking.php?id=<?= $row['id']; ?>" class="btn btn-primary">Pesan Sekarang</a>
                    <a href="index.php" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
