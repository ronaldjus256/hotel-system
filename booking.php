<?php
include 'config/db.php';

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
    <title>Pemesanan Kamar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Pemesanan Kamar: <?= htmlspecialchars($room['name']); ?></h2>
    <form action="process_booking.php" method="POST">
        <input type="hidden" name="room_id" value="<?= $room['id']; ?>">
        <label for="name">Nama:</label>
        <input type="text" name="full_name" placeholder="Nama Lengkap" class="form-control mb-2" required>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <label for="phone">Nomor Telepon:</label>
        <input type="text" name="phone" placeholder="Nomor Telepon" class="form-control mb-2" required>
        <label for="check_in">Check-in:</label>
        <input type="date" name="check_in" class="form-control mb-2" required>
        <label for="check_out">Check-out:</label>
        <input type="date" name="check_out" class="form-control mb-2" required>
        <label for="guests">Jumlah Tamu:</label>
        <input type="number" name="guests" placeholder="Jumlah Tamu" class="form-control mb-2" required>
        <button type="submit" name="book" class="btn btn-success">Pesan</button>
    </form>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            var fullName = document.forms["bookingForm"]["full_name"].value;
            var email = document.forms["bookingForm"]["email"].value;
            var phone = document.forms["bookingForm"]["phone"].value;
            var checkIn = document.forms["bookingForm"]["check_in"].value;
            var checkOut = document.forms["bookingForm"]["check_out"].value;
            var guests = document.forms["bookingForm"]["guests"].value;

            if (fullName == "" || email == "" || phone == "" || checkIn == "" || checkOut == "" || guests == "") {
                alert("Semua kolom harus diisi!");
                return false;
            }

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!email.match(emailPattern)) {
                alert("Masukkan email yang valid!");
                return false;
            }

            return true;
        }

        function calculateTotalPrice() {
            var pricePerNight = <?php echo $room['price']; ?>; // Harga per malam dari database
            var checkInDate = document.getElementById("check_in").value;
            var checkOutDate = document.getElementById("check_out").value;
            var guests = document.getElementById("guests").value;

            if (checkInDate && checkOutDate && guests) {
                var checkIn = new Date(checkInDate);
                var checkOut = new Date(checkOutDate);
                var diffTime = Math.abs(checkOut - checkIn);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                var totalPrice = pricePerNight * diffDays * guests;
                document.getElementById("total_price").innerText = "Rp. " + totalPrice.toLocaleString();
            }
        }
    </script>
</div>
</body>
</html>
