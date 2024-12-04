<?php
include("config.php");

$id = $_GET['id'];
$sql = "SELECT * FROM siswa WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);
$jenis_kelamin = ucfirst($siswa['jenis_kelamin']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Pendaftaran</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="registration-card">
        <div class="card-header">
            <h2>Kursus Web</h2>
            <h4>Kartu Pendaftaran Siswa Baru</h4>
        </div>
        <a href="list-siswa.php" class="back-button">← Kembali</a>
        <div class="card-content">
            <table>
                <tr>
                    <td><strong>Nama Lengkap</strong></td>
                    <td>: <?php echo $siswa['nama']; ?></td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: <?php echo $siswa['alamat']; ?></td>
                </tr>
                <tr>
                    <td><strong>Jenis Kelamin</strong></td>
                    <td>: <?php echo $jenis_kelamin; ?></td>
                </tr>
                <tr>
                    <td><strong>Agama</strong></td>
                    <td>: <?php echo $siswa['agama']; ?></td>
                </tr>
                <tr>
                    <td><strong>Sekolah Asal</strong></td>
                    <td>: <?php echo $siswa['asal_sekolah']; ?></td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <p>Simpan kartu ini sebagai bukti keanggotaan.</p>
        </div>
        <button onclick="window.print()" class="cetak-button">Cetak Kartu</button>
        
    </div>
</body>
</html>