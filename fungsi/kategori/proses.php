<?php 
include 'fungsi.php';

// Handle tambah dan edit
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST);
    } elseif ($_POST['aksi'] == "edit") {
        $berhasil = ubah_data($_POST);
    }

    if ($berhasil) {
        header("Location: ../../page/kategori.php");
        exit;
    } else {
        echo "Gagal memproses data.";
    }
}

// Handle hapus
if (isset($_GET['hapus'])) {
    $berhasil = hapus_data($_GET);
    if ($berhasil) {
        header("Location: ../../page/kategori.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
}
?>
