<?php
session_start();
include '../config/db.php';

// Periksa apakah user sudah login dan memiliki role 'admin'
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php"); // Arahkan ke halaman login jika tidak memiliki akses
    exit();
}

// Ambil semua data booking dari database (tanpa tabel users)
$query = "SELECT bookings.*, rooms.name AS room_name
          FROM bookings
          JOIN rooms ON bookings.room_id = rooms.id
          ORDER BY bookings.id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan - Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Pemesanan</h2>

    <!-- Tampilkan pesan sukses atau error -->
    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <!-- Tabel Daftar Pemesanan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Email</th>
                <th>Room Name</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Jumlah Tamu</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($booking = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$booking['full_name']}</td>
                        <td>{$booking['email']}</td>
                        <td>{$booking['room_name']}</td>
                        <td>{$booking['check_in']}</td>
                        <td>{$booking['check_out']}</td>
                        <td>{$booking['guests']}</td>
                        <td>Rp. " . number_format($booking['total_price'], 2) . "</td>
                        <td>" . ucfirst($booking['payment_status']) . "</td>
                        <td>
                            <a href='../process_payment.php?booking_id={$booking['id']}' class='btn btn-success btn-sm'>Lihat Pembayaran</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
    
    <!-- Tombol Kembali ke Dashboard -->
    <a href="dashboard.php" class="btn btn-primary">Kembali ke Dashboard</a>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
