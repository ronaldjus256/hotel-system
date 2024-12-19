<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM rooms WHERE id = $id");
    $room = mysqli_fetch_assoc($result);
}

if (!$room) {
    echo "Kamar tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Kamar</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Kamar</h2>
    <form action="process_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $room['id']; ?>">
        <input type="text" name="name" value="<?= htmlspecialchars($room['name']); ?>" class="form-control mb-2" placeholder="Nama Kamar" required>
        <textarea name="description" class="form-control mb-2" placeholder="Deskripsi Kamar" required><?= htmlspecialchars($room['description']); ?></textarea>
        <input type="number" name="price" value="<?= $room['price']; ?>" class="form-control mb-2" placeholder="Harga" required>
        <input type="text" name="facilities" value="<?= htmlspecialchars($room['facilities']); ?>" class="form-control mb-2" placeholder="Fasilitas" required>
        <button type="submit" name="edit_room" class="btn btn-warning">Update</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
