<?php
include("../config/connection.php");

$id = $_POST['id'] ?? '';

$stmt = $connect->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Data gagal dihapus!";
}
?>