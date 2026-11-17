<?php 
include __DIR__ . '/BE/koneksi.php';
session_start();
$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
      echo "<script>
          alert('Gagal! Nama, email, username dan password tidak boleh kosong.');
          window.history.back(); // Kembali ke halaman form
        </script>";
      exit;
    }


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
    <link rel="stylesheet" href="FE/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <main class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <form action="" method="POST">
          <fieldset class="border rounded-3 p-4 bg-white shadow-sm">
            <legend class="w-auto">Login Akun</legend>

            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Buat password" autocomplete="new-password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">blom ada akun?</label>
                <label class="text-danger text-decoration-none fw-bold"><a class="text-decoration-none" href="index.php">Sign up</a></label>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">Login Akun</button>
          </fieldset>
        </form>
      </div>
    </div>
  </main>
</body>
</html>