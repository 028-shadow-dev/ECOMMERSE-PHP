    <?php 
    include __DIR__ . '/BE/koneksi.php';
    session_start();
    $error = '';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = mysqli_prepare($koneksi, "SELECT * FROM useraccount WHERE username = ?");

        mysqli_stmt_bind_param($stmt, "s", $username);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $data   = mysqli_fetch_assoc($result);

        if ($data) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['user_id']  = $data['id_User']; 
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['role'] = $data['role'];
                header("location: dashboard.php");
                exit;
            } else {
                $error = "Password salah!";
            }

        } else {
            $error = "Username tidak terdaftar!";
        }
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
    <form action="" method="POST">
        <label>USERNAME</label>
        <br>
        <input type="text" name="username" required>
        <br><br>

        <label>PASSWORD</label>
        <br>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit" name="login">Login Akun</button>
    </form>
    </body>
    </html>