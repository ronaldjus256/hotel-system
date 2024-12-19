<?php
include 'config/db.php';

if (isset($_POST['book'])) {
    $room_id = $_POST['room_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = $_POST['guests'];

    // Mengambil harga kamar dari database
    $room = mysqli_query($conn, "SELECT price FROM rooms WHERE id = $room_id");
    $room_data = mysqli_fetch_assoc($room);
    $price = $room_data['price'];

    // Menghitung selisih hari untuk total harga
    $date_diff = (strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24);
    $total_price = $price * $date_diff;

    // Menyimpan data pemesanan ke database
    $query = "INSERT INTO bookings (full_name, email, phone, check_in, check_out, guests, room_id, total_price) 
              VALUES ('$full_name', '$email', '$phone', '$check_in', '$check_out', '$guests', '$room_id', '$total_price')";
    if (mysqli_query($conn, $query)) {
        // Ambil ID pemesanan yang baru dimasukkan
        $booking_id = mysqli_insert_id($conn);

        // Redirect ke halaman konfirmasi dengan membawa booking_id
        header("Location: booking_confirmation.php?booking_id=$booking_id");
        exit(); // Pastikan kode setelah header tidak dijalankan
    } else {
        echo "Terjadi kesalahan saat memproses pemesanan.";
    }
}
?>
