<?php 
session_start();
include __DIR__ . '/koneksi.php';
if (!isset($_SESSION['login'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}
if (isset($_POST['supplier'])) {
    if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
        die("Error: Session user_id kosong! Silakan LOGOUT lalu LOGIN ulang.");
    }
    $user_id = $_SESSION['user_id'];

    $stmt = mysqli_prepare($koneksi, "UPDATE useraccount SET role='supplier' WHERE id_User = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    if ($_SESSION['role'] != 'supplier') {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['role'] = 'supplier';
            header("Location: ../dashboard.php");
            exit;
        } else {
            echo "Gagal memperbarui role: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal memperbarui role, role sudah supplier";
    }
    mysqli_stmt_close($stmt);   
}
?>