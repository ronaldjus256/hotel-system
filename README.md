Sistem Reservasi Hotel

Sistem ini adalah aplikasi berbasis web sederhana untuk mengelola reservasi hotel. Sistem ini mendukung fitur pemesanan kamar oleh pengguna, pembayaran, dan pengelolaan data pemesanan oleh admin.

Fitur Utama

Untuk Pengguna:

Melihat Daftar Kamar: Pengguna dapat melihat daftar kamar yang tersedia beserta informasi detail seperti deskripsi, fasilitas, dan harga.

Melakukan Pemesanan: Formulir pemesanan untuk memasukkan data seperti nama, email, nomor telepon, tanggal check-in, tanggal check-out, dan jumlah tamu.

Melakukan Pembayaran: Mengubah status pembayaran pemesanan menjadi "paid".

Mencetak Struk: Menghasilkan struk pembayaran untuk pemesanan.

Untuk Admin:

Kelola Kamar: Tambah, edit, dan hapus data kamar.

Lihat Pemesanan: Melihat semua data pemesanan yang telah dilakukan pengguna.

Instalasi

Clone Repository:

git clone <repository-url>
cd hotel-system

Setup Database:

Buat database baru di MySQL, misalnya hotel_db.

Impor file db_hotel.sql yang tersedia di proyek ini.

Konfigurasi Koneksi Database:

Edit file config/db.php untuk menyesuaikan pengaturan koneksi database Anda:

$conn = mysqli_connect("localhost", "username", "password", "hotel_db");

Jalankan di Server Lokal:
Pastikan Anda memiliki server lokal seperti XAMPP atau WAMP.

Pindahkan folder proyek ini ke direktori htdocs.

Akses di browser melalui http://localhost/hotel-system/.

Struktur Folder

hotel-system/
├── admin/
│   ├── add_room.php
│   ├── dashboard.php
│   ├── delete_room.php
│   ├── edit_room.php
│   ├── login.php
│   ├── logout.php
│   ├── process_add.php
│   ├── process_edit.php
│   ├── register.php
│   └── view_bookings.php
├── assets/
│   ├── css/
│   │   └── bootstrap.min.css
│   ├── js/
│   │   └── bootstrap.bundle.min.js
├── config/
│   └── db.php
├── index.php
├── room_list.php
├── booking.php
├── process_booking.php
├── booking_confirmation.php
└── db_hotel.sql

Teknologi yang Digunakan

Frontend: HTML, CSS (Bootstrap), JavaScript

Backend: PHP

Database: MySQL

Cara Penggunaan

Pengguna:

Akses halaman utama di index.php.

Klik "Lihat Kamar" untuk melihat daftar kamar yang tersedia.

Pilih kamar dan lakukan pemesanan melalui formulir.

Setelah pemesanan berhasil, lakukan pembayaran dan cetak struk.

Admin:

Login melalui admin/login.php.

Kelola data kamar dan lihat data pemesanan di dashboard admin.

Catatan Tambahan

Pastikan server lokal berjalan sebelum mengakses sistem.

Jangan lupa mengubah kredensial database di config/db.php sesuai dengan konfigurasi Anda.

