<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jenis_kelamin = ucwords(strtolower(mysqli_real_escape_string($conn, $_POST['jenis_kelamin'])));
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);
    $asal_sekolah = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);

    $sql = "INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, asal_sekolah)
            VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "success";
    } else {
        echo "error";
    }
}
?>