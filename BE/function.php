<?php
include __DIR__ . '/koneksi.php';
if (isset($_POST['register'])) {
    $username =  trim($_POST['username'] ?? '');
    $email =  trim($_POST['email']?? '');
    $nama =  trim($_POST['nama']?? '');
    $password =  trim($_POST['password']?? '');

    if (empty($username) || empty($email) || empty($nama) || empty($password)) {
        echo "<script>
                alert('Gagal! Nama, email, username dan password tidak boleh kosong.');
                window.history.back(); // Kembali ke halaman form
            </script>";
        exit;
    }

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = mysqli_prepare($koneksi, "INSERT INTO useraccount (username, email, nama, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $nama, $password_hashed);
    
    if (mysqli_stmt_execute($stmt)) {  
        $id_baru = mysqli_insert_id($koneksi);
        $_SESSION['user_id']  = $id_baru;
        header("Location: ../login.php");
        exit;
    } else {
        echo "Gagal mendaftar: " . mysqli_error($koneksi);
    }
    
    mysqli_stmt_close($stmt);
} else {
    header("Location: ../index.php");
    exit;
}
?>