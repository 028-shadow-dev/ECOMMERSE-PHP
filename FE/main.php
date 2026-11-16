<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .gambar-barang {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border: 5px solid #ccc;
        }
        .form-beli {
            border: 5px solid #ccc;
            width: 150px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 20px;
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
        <br>
        <button type="submit">Beli</button>
    </form>
</body>
</html>