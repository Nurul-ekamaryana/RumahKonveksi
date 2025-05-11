<?php 
include 'fungsi.php';

// Handle tambah dan edit
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST, $_FILES);
    } elseif ($_POST['aksi'] == "edit") {
        $berhasil = ubah_data($_POST, $_FILES);
    }

    if ($berhasil) {
        header("Location: ../../page/barang.php");
        exit;
    } else {
        echo "Gagal memproses data.";
    }
}

// Handle hapus
if (isset($_GET['hapus'])) {
    $berhasil = hapus_data($_GET);
    if ($berhasil) {
        header("Location: ../../page/barang.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
}
?>
