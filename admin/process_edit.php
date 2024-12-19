<?php
include '../config/db.php';

if (isset($_POST['edit_room'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $facilities = $_POST['facilities'];

    $query = "UPDATE rooms SET name='$name', description='$desc', price='$price', facilities='$facilities' WHERE id=$id";
    mysqli_query($conn, $query);

    header("Location: dashboard.php");
    exit();
}
?>
