<?php
include '../koneksi.php';

$id_kategori = '';
$nama_kategori = '';

if (isset($_GET['ubah'])) {
    $id_kategori = $_GET['ubah'];
    $query = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama_kategori = $result['nama_kategori'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['ubah']) ? 'Edit Kategori' : 'Tambah Kategori' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- W3.CSS & FontAwesome -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-padding-large">KATEGORI BARANG</a>
    </div>
</div>

<!-- Form -->
<div class="form-container">
    <form method="POST" action="../fungsi/kategori/proses.php">
        <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input required type="text" name="nama_kategori" id="nama_kategori" class="w3-input w3-border" placeholder="ex: Buket Bunga" value="<?= $nama_kategori ?>">
        <div class="btn-group" style="margin-top: 20px;">
            <?php if (isset($_GET['ubah'])): ?>
                    <button type="submit" name="aksi" value="edit" class="w3-button w3-blue w3-margin-right">Simpan Perubahan</button>
                <?php else: ?>
                    <button type="submit" name="aksi" value="add" class="w3-button w3-blue w3-margin-right">Input</button>
                <?php endif; ?>
                    <a href="../page/kategori.php" class="w3-button w3-red">Kembali</a>
        </div>
    </form>
</div>

</body>
</html>
