<?php
session_start();
include __DIR__ . '/FE/header.php';

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

</body>
</html>
<?php include __DIR__ . '/FE/footer.php' ?>