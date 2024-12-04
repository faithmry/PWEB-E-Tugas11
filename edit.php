<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM siswa WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $siswa = mysqli_fetch_array($query);


    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $asal_sekolah = $_POST['asal_sekolah'];

        $update_sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', asal_sekolah='$asal_sekolah' WHERE id=$id";
        mysqli_query($conn, $update_sql);

    
        header("Location: list-siswa.php");
    }
} else {
    echo "ID siswa tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $siswa['nama']; ?>" required>

            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?php echo $siswa['alamat']; ?>" required>

            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" <?php echo ($siswa['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($siswa['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>

            <label>Agama:</label>
            <input type="text" name="agama" value="<?php echo $siswa['agama']; ?>" required>

            <label>Sekolah Asal:</label>
            <input type="text" name="asal_sekolah" value="<?php echo $siswa['asal_sekolah']; ?>" required>

            <button type="submit" name="update">Update</button>
        </form>
        <a href="list-siswa.php">← Kembali ke Daftar Siswa</a>
    </div>
</body>
</html>
