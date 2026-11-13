<?php
session_start();

// Pengaman: Jika belum login, tendang balik ke login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

    <h1>Selamat Datang di Dashboard, <?=
    $_SESSION['nama']; ?>!</h1>
    <p>Kamu berhasil login menggunakan username:
    <strong><?= $_SESSION['username']; ?></strong></p>

    <hr>
    <!-- Kamu bisa buat logout.php nanti -->
    <a href="logout.php">Logout</a>

</body>
</html>