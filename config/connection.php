<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "kampus";
$port = 3306;

$connect = new mysqli(
    $hostname,
    $username,
    $password,
    $database,
    $port
);

if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}