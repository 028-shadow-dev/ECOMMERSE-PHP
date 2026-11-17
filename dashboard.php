<?php
session_start();
include __DIR__ . '/FE/nav.php';
include __DIR__ . '/FE/header.php';
include __DIR__ . '/BE/koneksi.php';
include __DIR__ . '/FE/main.php';

// Pengaman: Jika belum login, tendang balik ke login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['role'] === "supplier") {
    include __DIR__ . '/FE/supplierform.php';

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM barang (nama_produk, jumlah_produk) VALUE (?,?)");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/FE/css/bootstrap.min.css">
</head>
<body>
    <form class="form-beralih" action="BE/supplierlogin.php" method="POST">        
        <label>SUPPLIER ACCOUNT</label>
        <br>
        <button type="submit" name="supplier">Beralih ke Supplier</button>
        <br><br>
    </form>
</body>
</html>
<?php include __DIR__ . '/FE/footer.php' ?>