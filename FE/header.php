<?php 
$roles = '';
if ($_SESSION['role'] == 1) {
    $roles = "supplier";
} else {
    $roles = "user/buyer";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard, <?= $_SESSION['nama']; ?>!</h1>
    <p>Kamu berhasil login menggunakan username:
    <strong><?= $_SESSION['username']; ?></strong> <br> Dan Roles mu <b><?= $roles ?></b></p>
    <hr>
</body>
</html>