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
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="brand">WELCOME</div>
    <ul>
      <a href="../fungsi/logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
    </ul>
</nav>

<!-- Form -->
<div class="table-container">
    <form method="POST" action="../fungsi/kategori/proses.php">
        <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input required type="text" name="nama_kategori" id="nama_kategori" class="area_txt" placeholder="ex: Buket Bunga" value="<?= $nama_kategori ?>">
        <div class="btn-group" style="margin-top: 20px;">
            <?php if (isset($_GET['ubah'])): ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-blue">Simpan Perubahan</button>
                <?php else: ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-blue">Input</button>
                <?php endif; ?>
                    <a href="../page/kategori.php" class="btn btn-red">Kembali</a>
        </div>
    </form>
</div>

</body>
</html>
