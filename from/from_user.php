<?php
include '../koneksi.php';
$id_user = '';
$nama = '';
$password = '';
$no_telp = '';
$alamat = '';
$role = '';

if (isset($_GET['ubah'])) {
    $id_user = $_GET['ubah'];
    $query = "SELECT * FROM user WHERE id_user = '$id_user';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $nama = $result['nama'];
    $password = $result['password'];        
    $no_telp = $result['no_telp'];
    $alamat = $result['alamat'];
    $role = $result['role'];
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
    <form method="POST" action="../fungsi/user/proses.php">
        <input type="hidden" name="id_user" value="<?= $id_user ?>">
        <label for="nama" class="form-label">Nama</label>
        <input required type="text" name="nama" id="nama" class="area_txt" placeholder="ex: Buket Bunga" value="<?= $nama ?>">

        <label for="password" class="form-label">password</label>
        <input required type="text" name="password" id="password" class="area_txt" placeholder="ex: Buket Bunga" value="<?= $password ?>">

        <label for="no_telp" class="form-label">no_telp</label>
        <input required type="text" name="no_telp" id="no_telp" class="area_txt" placeholder="ex: Buket Bunga" value="<?= $no_telp ?>">

        <label for="alamat" class="form-label">alamat</label>
        <input required type="text" name="alamat" id="alamat" class="area_txt" placeholder="ex: Buket Bunga" value="<?= $alamat ?>">

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
