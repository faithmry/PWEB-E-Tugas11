<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulir Pendaftaran</h1>
        <a href="index.php" class="back-button">← Kembali ke Menu Utama</a>
        <form action="simpan.php" method="POST" id="formDaftar" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>
            <div class="rad">
                <label>Jenis Kelamin:</label><br>
                <div class="radop">
                <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                </div>
            </div>
            <select name="agama" required>
                <option value="" disabled selected>Pilih Agama</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
            </select>
            <input type="text" name="asal_sekolah" placeholder="Sekolah Asal" required>
            <div class="rad">
                <label for="foto">Unggah Foto:</label>
                <input type="file" name="foto" accept="image/*" required>
            </div>
            <br></br>
            <input type="submit" value="Daftar">
        </form>
        <div id="confirmationMessage" class="confirmation"></div>
    </div>
    
    <script>
    const form = document.getElementById('formDaftar');
    const confirmationMessage = document.getElementById('confirmationMessage');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch('simpan.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            confirmationMessage.classList.remove('error', 'success');

            if (data === "success") {
                confirmationMessage.textContent = "Pendaftaran Berhasil! Terima kasih telah mendaftar.";
                confirmationMessage.classList.add('success');
                form.reset(); 
            } else {
                confirmationMessage.textContent = "Terjadi kesalahan, silakan coba lagi.";
                confirmationMessage.classList.add('error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            confirmationMessage.textContent = "Terjadi kesalahan koneksi.";
            confirmationMessage.classList.add('error');
        });
    });
</script>

</body>
</html>
