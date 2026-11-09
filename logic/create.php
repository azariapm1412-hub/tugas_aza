<?php
include("../config/connection.php");

$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';

$stmt = $connect->prepare(
    "INSERT INTO mahasiswa (nim, nama, jenis_kelamin, created_at)
     VALUES (?, ?, ?, NOW())"
);

$stmt->bind_param("sss", $nim, $nama, $jenis_kelamin);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Data gagal ditambahkan!";
}
?>