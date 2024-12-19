<?php
include '../config/db.php';
if (isset($_POST['add_room'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $facilities = $_POST['facilities'];

    $query = "INSERT INTO rooms (name, description, price, facilities) VALUES ('$name', '$desc', '$price', '$facilities')";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}
?>
