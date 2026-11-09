<?php
include("config/connection.php");

$id = $_GET['id'] ?? '';

$stmt = $connect->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data   = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    die("DATA MAHASISWA TIDAK DITEMUKAN");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    <form action="logic/update.php" method="POST">
        <input type="hidden" name="id" value="<?= (int)$data['id'] ?>">

        <label for="nim">NIM :</label><br>
        <input type="text" name="nim" id="nim" value="<?= htmlspecialchars($data['nim']) ?>" required><br><br>

        <label for="nama">Nama :</label><br>
        <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required><br><br>

        <label for="prodi">Prodi :</label><br>
        <input type="text" name="prodi" id="prodi" value="<?= htmlspecialchars($data['prodi']) ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="index.php">Kembali</a>
</body>
</html>