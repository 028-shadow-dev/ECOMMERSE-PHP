<?php 
    include __DIR__ . '/../BE/koneksi.php';
    if ($_SESSION['role'] === "supplier") {


        $stmt = mysqli_prepare($koneksi, "SELECT * FROM barang (nama_produk, jumlah_produk) VALUES (?,?)");
        mysqli_stmt_bind_param($stmt, "ss", );
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .gambar-barang {
            width: 150px;
            height: 200px;
            object-fit: cover;
            border: 5px solid #ccc;
        }
        .form-beli {
            border: 5px solid #ccc;
            width: 200px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        label {
            font-size: 24px;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form class="form-beli" action="BE/produk.php" method="POST">
        <label>Beli barang</label>
        <div>
            <img src="FE/img/tel.avif" alt="ליב, אשתי" class="gambar-barang">
        </div>
        <hr><br>
        <button type="submit" name="beli">Beli</button>
    </form>
</body>
</html>