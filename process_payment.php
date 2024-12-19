<?php
include 'config/db.php';

// Mendapatkan ID pemesanan dari URL
$booking_id = $_GET['booking_id'];

// Ambil data pemesanan berdasarkan booking_id
$query = "SELECT * FROM bookings WHERE id = $booking_id";
$result = mysqli_query($conn, $query);
$booking = mysqli_fetch_assoc($result);

if (!$booking) {
    echo "Pemesanan tidak ditemukan.";
    exit();
}

// Proses Pembayaran
if (isset($_POST['pay'])) {
    // Update status pembayaran menjadi 'paid'
    $update_query = "UPDATE bookings SET payment_status = 'paid' WHERE id = $booking_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<p>Pembayaran berhasil!</p>";
    } else {
        echo "<p>Terjadi kesalahan saat memproses pembayaran.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pemesanan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Pembayaran Pemesanan</h2>
    <table class="table">
        <tr>
            <th>Nama</th>
            <td><?php echo $booking['full_name']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $booking['email']; ?></td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td><?php echo $booking['phone']; ?></td>
        </tr>
        <tr>
            <th>Tanggal Check-in</th>
            <td><?php echo $booking['check_in']; ?></td>
        </tr>
        <tr>
            <th>Tanggal Check-out</th>
            <td><?php echo $booking['check_out']; ?></td>
        </tr>
        <tr>
            <th>Jumlah Tamu</th>
            <td><?php echo $booking['guests']; ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp. <?php echo number_format($booking['total_price'], 2); ?></td>
        </tr>
        <tr>
            <th>Status Pembayaran</th>
            <td><?php echo ucfirst($booking['payment_status']); ?></td>
        </tr>
    </table>

    <!-- Tombol Pembayaran -->
    <?php if ($booking['payment_status'] == 'pending'): ?>
        <form method="POST">
            <button type="submit" name="pay" class="btn btn-success mb-3">Lakukan Pembayaran</button>
        </form>
    <?php else: ?>
        <p>Pembayaran sudah dilakukan.</p>
    <?php endif; ?>
    <button onclick="window.location.href='booking_confirmation.php?booking_id=<?php echo $booking_id; ?>'" class="btn btn-primary">Kembali ke Pembayaran</button>
</div>
</body>
</html>
