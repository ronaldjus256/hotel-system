<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Kusuma Persada</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        /* Custom styling for a modern look */
        body {
            background-color: blueviolet;
            font-family: 'Arial', sans-serif;
        }

        .hero-section {
            background-image: url('assets/images/hotel.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            margin-bottom: 30px;
        }

        .hero-section h1 {
            font-size: 3em;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.5em;
            margin: 20px 0;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            text-transform: uppercase;
        }

        .btn-custom:hover {
            background-color: #218838;
            color: white;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Selamat Datang di Hotel Kusuma Persada</h1>
        <p>Tempat terbaik untuk menginap dengan fasilitas terbaik!</p>
        <a href="room_list.php" class="btn btn-custom">Lihat Kamar</a>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/images/Desain-Kamar-Hotel-Bintang-5-Luxury.jpg" class="card-img-top" alt="Room 1">
                    <div class="card-body">
                        <h5 class="card-title">Kamar Superior</h5>
                        <p class="card-text">Nikmati kenyamanan kamar superior dengan fasilitas modern.</p>
                        <a href="room_list.php" class="btn btn-custom">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/images/Kamar Mandi Hotel Bintang 5 Gulf Hotel Bahrain.jpg" class="card-img-top" alt="Room 2">
                    <div class="card-body">
                        <h5 class="card-title">Kamar Deluxe</h5>
                        <p class="card-text">Kamar deluxe dengan pemandangan yang menakjubkan dan layanan istimewa.</p>
                        <a href="room_list.php" class="btn btn-custom">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/images/kamar-hotel.jpg" class="card-img-top" alt="Room 3">
                    <div class="card-body">
                        <h5 class="card-title">Kamar Eksekutif</h5>
                        <p class="card-text">Kamar eksekutif yang menawarkan kenyamanan dan kemewahan.</p>
                        <a href="room_list.php" class="btn btn-custom">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login & Logout Buttons -->
        <div class="text-center mb-4">
            <a href="admin/login.php" class="btn btn-secondary">Login</a>
            <a href="admin/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Hotel Kusuma Persada. All Rights Reserved.</p>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
