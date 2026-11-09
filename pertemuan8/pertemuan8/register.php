<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi User</h1>

    <?php
    if (isset($_GET['pesan'])) {
        $p = $_GET['pesan'];
        if ($p == 'kosong')      echo '<p>Username/Password tidak boleh kosong</p>';
        if ($p == 'bedapass')    echo '<p>Konfirmasi password berbeda</p>';
        if ($p == 'usernameada') echo '<p>Username sudah dipakai</p>';
        if ($p == 'gagal')       echo '<p>Registrasi Gagal, Coba Lagi</p>';
    }
    ?>

    <form action="logic/registerController.php" method="POST">
        <label for="usn">Username :</label>
        <input type="text" name="usn" id="usn" placeholder="Masukan Username" required><br><br>

        <label for="pass">Password :</label>
        <input type="password" name="pass" id="pass" placeholder="Masukan Password" required><br><br>

        <label for="confirm">Konfirmasi Password :</label>
        <input type="password" name="confirm" id="confirm" placeholder="Confirm Password" required><br><br>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah Punya Akun? <a href="login.php">Login</a></p>
</body>
</html>