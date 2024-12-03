<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'pendaftaran_siswa';

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>