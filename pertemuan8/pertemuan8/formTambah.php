<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form action="logic/create.php" method="POST">
        <label for="nim">NIM :</label><br>
        <input type="text" name="nim" id="nim" required><br><br>

        <label for="nama">Nama :</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="prodi">Prodi :</label><br>
        <input type="text" name="prodi" id="prodi" required><br><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>