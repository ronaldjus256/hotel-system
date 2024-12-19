<?php
session_start();
include 'config/db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: admin/login.php'); // Arahkan ke halaman login jika pengguna belum login
    exit();
}

// Ambil booking_id dari URL atau session
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Ambil data pemesanan dari database
    $query = "SELECT b.*, r.name AS room_name 
              FROM bookings b 
              JOIN rooms r ON b.room_id = r.id 
              WHERE b.id = '$booking_id'";
    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);
    
    if (!$booking) {
        echo "Pemesan tidak ditemukan!";
        exit();
    }
} else {
    echo "Booking ID tidak valid!";
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Konfirmasi Pemesanan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>Jumlah Tamu</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($booking['full_name']); ?></td>
                <td><?php echo htmlspecialchars($booking['email']); ?></td>
                <td><?php echo htmlspecialchars($booking['phone']); ?></td>
                <td><?php echo htmlspecialchars($booking['check_in']); ?></td>
                <td><?php echo htmlspecialchars($booking['check_out']); ?></td>
                <td><?php echo htmlspecialchars($booking['guests']); ?></td>
                <td><?php echo "Rp " . number_format($booking['total_price'], 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Tombol Pembayaran -->
    <a href="process_payment.php?booking_id=<?php echo $booking['id']; ?>" class="btn btn-success">Lakukan Pembayaran</a>

    <!-- Tombol Cetak Struk -->
    <a href="print_receipt.php?booking_id=<?php echo $booking['id']; ?>" class="btn btn-primary" target="_blank">Cetak Struk Pembayaran</a>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>

</body>
</html>
