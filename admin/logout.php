<?php
session_start();
session_unset(); // Menghapus semua data sesi
session_destroy(); // Menghancurkan sesi

// Mengarahkan pengguna kembali ke halaman login
header("Location: login.php");
exit();
?>
