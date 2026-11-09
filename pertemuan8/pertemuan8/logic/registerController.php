<?php
include("../config/connection.php");
session_start();

$usn     = trim($_POST['usn'] ?? '');
$pass    = $_POST['pass'] ?? '';
$confirm = $_POST['confirm'] ?? '';

if ($usn === '' || $pass === '') {
    header("location: ../register.php?pesan=kosong");
    exit;
}

if ($pass !== $confirm) {
    header("location: ../register.php?pesan=bedapass");
    exit;
}

$stmt = $connect->prepare("SELECT id FROM admin WHERE username = ?");
$stmt->bind_param("s", $usn);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    header("location: ../register.php?pesan=usernameada");
    exit;
}
$stmt->close();

$hash = password_hash($pass, PASSWORD_DEFAULT);
$role = 'user';

$stmt = $connect->prepare("INSERT INTO admin (username, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usn, $hash, $role);

if ($stmt->execute()) {
    header("location: ../login.php?pesan=regisberhasil");
} else {
    header("location: ../register.php?pesan=gagal");
}
exit;
?>