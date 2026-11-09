<?php
include("../config/connection.php");

$nim   = $_POST['nim'] ?? '';
$nama  = $_POST['nama'] ?? '';
$prodi = $_POST['prodi'] ?? '';

$stmt = $connect->prepare("INSERT INTO mahasiswa (nim, nama, prodi) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nim, $nama, $prodi);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Data gagal ditambahkan!";
}
?>