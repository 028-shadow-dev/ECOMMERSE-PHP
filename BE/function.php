<?php
include __DIR__ . '/koneksi.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $nama     = $_POST['nama'];
    $password = $_POST['password'];
    
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = mysqli_prepare($koneksi, "INSERT INTO useraccount (username, email, nama, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $nama, $password_hashed);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../login.php");
        exit;
    } else {
        echo "Gagal mendaftar: " . mysqli_error($koneksi);
    }
    
    mysqli_stmt_close($stmt);
} else {
    // Jika ada yang mencoba buka BE/function.php langsung lewat URL tanpa submit form
    header("Location: ../index.php");
    exit;
}
?>