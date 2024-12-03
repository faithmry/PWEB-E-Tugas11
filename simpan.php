<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jenis_kelamin = ucwords(strtolower(mysqli_real_escape_string($conn, $_POST['jenis_kelamin'])));
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);
    $asal_sekolah = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);

    if(move_uploaded_file($tmp, $target_file)){
    $sql = "INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, asal_sekolah, foto)
            VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah', '$foto')";
    $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        die("Gagal mengunggah foto.");
    }
}
?>