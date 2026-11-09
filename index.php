<?php

include 'config/connection.php';

$query = "SELECT * FROM mahasiswa ORDER BY id DESC";
$result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="tambah.php">Tambah Mahasiswa</a> <br> <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        <?php
        $no = 1;
        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data["nim"]; ?></td>
                    <td><?= $data["nama"]; ?></td>
                    <td><?= $data["jenis_kelamin"]; ?></td>
                    <td><?= $data["created_at"]; ?></td>
                    <td><a href="update.php?id= <?=  $data["id"]; ?>"> Update </a></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="5" style="text-align: center;">
                    Data mahasiswa belum tersedia
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>