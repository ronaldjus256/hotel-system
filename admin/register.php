<?php
session_start();
include '../config/db.php'; // Pastikan Anda menyertakan file koneksi ke database

if (isset($_POST['register'])) {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Validasi password
    if ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Periksa apakah email sudah terdaftar
        $check_email = mysqli_query($conn, "SELECT * FROM admins WHERE email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            // Insert data ke tabel users
            $query = "INSERT INTO admins (email, password, role) VALUES ('$email', '$hashed_password', '$role')";
            if (mysqli_query($conn, $query)) {
                $success = "Pendaftaran berhasil! Silakan login.";
            } else {
                $error = "Terjadi kesalahan, coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> <!-- CSS Bootstrap -->
</head>
<body>
<div class="container mt-5">
    <h2>Registrasi Akun</h2>

    <!-- Menampilkan pesan error atau sukses -->
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p class='text-success'>$success</p>"; ?>
    
    <!-- Form Registrasi -->
    <form method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Konfirmasi Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" name="register" class="btn btn-primary">Daftar</button>
    </form>

    <p class="mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
