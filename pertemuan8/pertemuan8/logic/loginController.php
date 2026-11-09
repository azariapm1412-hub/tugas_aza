<?php
include("../config/connection.php");
session_start();

$usn  = trim($_POST['usn'] ?? '');
$pass = $_POST['pass'] ?? '';

if ($usn === '' || $pass === '') {
    header("location: ../login.php?pesan=gagal");
    exit;
}

$stmt = $connect->prepare("SELECT id, username, password, role FROM admin WHERE username = ?");
$stmt->bind_param("s", $usn);
$stmt->execute();
$result = $stmt->get_result();
$data   = $result->fetch_assoc();
$stmt->close();

if ($data && password_verify($pass, $data['password'])) {
    $_SESSION['usn']  = $data['username'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['id']   = $data['id'];

    if (isset($_POST['remember'])) {
        setcookie('remember_usn', $usn, time() + (86400 * 8), '/');
    } else {
        setcookie('remember_usn', '', time() - 3600, '/');
    }

    if ($data['role'] === 'admin') {
        header("location: ../index.php");
    } else {
        header("location: ../dashboardUser.php");
    }
    exit;
} else {
    header("location: ../login.php?pesan=gagal");
    exit;
}
?>