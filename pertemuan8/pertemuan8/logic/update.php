<?php
include("../config/connection.php");

$id    = $_POST['id'] ?? '';
$nim   = $_POST['nim'] ?? '';
$nama  = $_POST['nama'] ?? '';
$prodi = $_POST['prodi'] ?? '';

$stmt = $connect->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, prodi = ? WHERE id = ?");
$stmt->bind_param("sssi", $nim, $nama, $prodi, $id);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Data gagal diperbarui!";
}
?>