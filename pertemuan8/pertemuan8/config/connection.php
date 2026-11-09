<?php
$hostname = "localhost";
$username = "root";
$password = "";
$port = 3306;
$database = "db_mahasiswa";

$connect = new mysqli($hostname, $username, $password, $database, $port);

if ($connect->connect_error) {
    die("Koneksi gagal " . $connect->connect_error);
}
?>