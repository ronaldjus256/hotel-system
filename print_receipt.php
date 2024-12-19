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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .table th, .table td {
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Struk Pembayaran</h2>
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

    <!-- Tombol untuk mencetak struk -->
    <button onclick="window.print()" class="btn btn-primary">Cetak Struk</button>
    <button  onclick="window.location.href='admin/login.php'" class="btn btn-danger">Logout</button>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
