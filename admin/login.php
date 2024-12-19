<?php
session_start();
include '../config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admins WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Set session untuk email dan role (admin atau user)
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['role'];

            // Cek role dan arahkan ke halaman yang sesuai
            if ($row['role'] == 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            $error = "Email atau password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>

    <!-- Button untuk menuju halaman Register -->
    <p>Belum punya akun? <a href="register.php" class="btn btn-link">Daftar di sini</a></p>
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

        // Validasi format email
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!email.match(emailPattern)) {
            alert("Masukkan email yang valid!");
            return false;
        }

        return true; // Jika semua validasi berhasil
    }
</script>

</div>
</body>
</html>
