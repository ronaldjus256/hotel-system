<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include '../config/db.php';
$result = mysqli_query($conn, "SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Dashboard Admin</h1>
    <a href="add_room.php" class="btn btn-success mb-3">Tambah Kamar</a>
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
    <a href="view_bookings.php" class="btn btn-primary mb-3">Lihat Booking</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Kamar</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td>Rp. <?= number_format($row['price'], 2); ?></td>
            <td>
                <a href="edit_room.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_room.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
