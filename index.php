<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="BE/function.php" method="POST">
    <label>USERNAME</label>
    <br>
    <input type="text" name="username" required>
    <br><br>

    <label>EMAIL</label>
    <br>
    <input type="email" name="email" required>
    <br><br>

    <label>NAMA</label>
    <br>
    <input type="text" name="nama" required>
    <br><br>

    <label>PASSWORD</label>
    <br>
    <input type="password" name="password" required>
    <br><br>

    <label>SUPPLIER ACCOUNT</label>
    <br>
    <input type="checkbox" name="supplier">
    <br><br>

    <button type="submit" name="register">Daftar Akun</button>
</form>
</body>
</html>