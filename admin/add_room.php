<!DOCTYPE html>
<html lang="id">

<head>
    <title>Tambah Kamar</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Kamar</h2>
        <form action="process_add.php" method="POST">
            <input type="text" name="name" placeholder="Nama Kamar" class="form-control mb-2" required>
            <textarea name="description" placeholder="Deskripsi Kamar" class="form-control mb-2" required></textarea>
            <input type="number" name="price" placeholder="Harga" class="form-control mb-2" required>
            <input type="text" name="facilities" placeholder="Fasilitas" class="form-control mb-2" required>
            <button type="submit" name="add_room" class="btn btn-success">Tambah</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        </form>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>