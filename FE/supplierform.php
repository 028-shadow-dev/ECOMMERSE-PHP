<?php 
include __DIR__ . '/../BE/produk.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/BE/produk.php" method="POST">
        <label>Input nama barang</label>
        <input type="text" name="nama-barang" placeholder="input disini">
        <br>
        <label>Input Jumlah Barang</label>
        <input type="number" name="jumlah-barang" placeholder="masukan jumlah barang">
        <br>
        <button type="submit" name="masukan-barang">submit</button>
    </form>
    <?php if(!empty($error)) { ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Warning!</h4>
        <p class="alert-heading"><a><?php $error ?></a></p>
    </div>
    <?php } ?>
</body>
</html>