<?php 
    include __DIR__ . '/koneksi.php';
    if (isset($_POST['masukan-barang'])) {
        $namaBarang = trim($_POST['nama-barang'] ?? '');
        $jumlahBarang = trim($_POST['jumlah-barang'] ?? '');

        if (empty($namaBarang) || empty($jumlahBarang)) {
            echo "<script>
                    alert('Gagal! Nama dan jumlah tidak boleh kosong.');
                    window.history.back(); // Kembali ke halaman form
                </script>";
            exit;
        }
        $stmt = mysqli_prepare($koneksi, "INSERT INTO barang (nama_produk, jumlah_produk) VALUE (?,?)");
        mysqli_stmt_bind_param($stmt, "si", $namaBarang, $jumlahBarang);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data   = mysqli_fetch_assoc($result);

        if ($data) {
            $id_baru = mysqli_insert_id($koneksi);
            $_SESSION['id_produk']  = $id_baru;
            header("location: ../dashboard.php");
            exit;
        }
    }
?>