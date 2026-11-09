<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <?php
    if (isset($_GET['pesan'])) {
        $p = $_GET['pesan'];
        if ($p == 'gagal')         echo '<h3>Login Gagal</h3>';
        if ($p == 'logout')        echo '<h3>Berhasil Logout</h3>';
        if ($p == 'regisberhasil') echo '<h3>Registrasi berhasil, silakan login</h3>';
    }
    ?>
    <h1>Login</h1>
    <form action="logic/loginController.php" method="POST">
        <label for="usn">Username :</label>
        <input type="text" name="usn" id="usn" placeholder="Masukan Username"
               value="<?= htmlspecialchars($_COOKIE['remember_usn'] ?? '', ENT_QUOTES) ?>" required><br><br>

        <label for="pass">Password :</label>
        <input type="password" name="pass" id="pass" placeholder="Masukan Password" required><br><br>

        <input type="checkbox" name="remember" value="yes"> Remember me<br><br>
        <button type="submit">Login</button>
    </form>

    <p>Belum Punya Akun? <a href="register.php">Registrasi</a></p>
</body>
</html>