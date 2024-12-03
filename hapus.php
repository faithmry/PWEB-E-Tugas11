<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM siswa WHERE id = $id";
    mysqli_query($conn, $sql);

    header("Location: list-siswa.php");
} else {
    echo "ID siswa tidak ditemukan!";
    exit;
}
?>
