<?php
session_start();

// Cek Login & Role
if (empty($_SESSION['usn'])) {
    header('location: login.php');
    exit;
}
if ($_SESSION['role'] !== 'user') {
    header('location: index.php');
    exit;
}

include("config/connection.php");

$sql = "SELECT * FROM mahasiswa";
if(isset($_GET['cari']))
{
    $cari_nama = $_GET['cari'];
    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari_nama%'";
}
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <div class="row mb-3">
        <form class="d-flex" method="get" action="dashboardUser.php">
            <input type="text" class="form-control me-2" placeholder="Cari mahasiswa" name="cari" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit" style="background-color: white;">Cari</button>
        </form>
    </div>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>

        <?php
        $no = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $data["nim"];?></td>
                    <td><?= $data["nama"];?></td>
                    <td><?= $data["prodi"];?></td>
                </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center;'>Data tidak ditemukan</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="logic/logout.php">Logout</a>
</body>
</html>