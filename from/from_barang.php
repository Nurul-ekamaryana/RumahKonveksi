<?php 
include '../koneksi.php';

$id_barang = '';
$nama_barang = '';
$harga = '';
$stok = '';
$deskripsi = '';
$id_kategori = '';

// Ambil data jika mode edit
if (isset($_GET['ubah'])) {
    $id_barang = $_GET['ubah'];
    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nama_barang = $result['nama_barang'];
    $harga = $result['harga'];
    $stok = $result['stok'];
    $deskripsi = $result['deskripsi'];
    $id_kategori = $result['id_kategori'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['ubah']) ? 'Edit Barang' : 'Tambah Barang' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <form method="POST" action="../fungsi/barang/proses.php" enctype="multipart/form-data">
        <a class="btn btn-green" href="../page/kategori.php" >Tambah Kategori Baru</a>   
        <label for="id_kategori" class="form-label">Kategori Barang</label>
        <select required name="id_kategori" id="id_kategori" class="area_txt">
            <option disabled <?= $id_kategori == '' ? 'selected' : '' ?>>Pilih kategori</option>
            <?php
            $queryKategori = "SELECT * FROM kategori";
            $sqlKategori = mysqli_query($conn, $queryKategori);
            while ($kategori = mysqli_fetch_assoc($sqlKategori)) :
                $selected = $kategori['id_kategori'] == $id_kategori ? 'selected' : '';
            ?>
                <option value="<?= $kategori['id_kategori']; ?>" <?= $selected ?>>
                    <?= $kategori['nama_kategori']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="hidden" name="id_barang" value="<?= $id_barang ?>">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input required type="text" name="nama_barang" id="nama_barang" class="area_txt" placeholder="ex: Buket Bunga" value="<?= $nama_barang ?>">
        <br>

        <label for="harga_barang" class="form-label">Harga</label>
        <input required type="number" name="harga" id="harga_barang" class="area_txt" placeholder="ex: 10000" value="<?= $harga ?>">
        <br>
        
        <label for="stok_barang" class="form-label">Stok</label>
        <input required type="number" name="stok" id="stok_barang" class="area_txt" placeholder="ex: 10" value="<?= $stok ?>">
        <br>

        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea required name="deskripsi" id="deskripsi" class="area_txt" rows="3"><?= $deskripsi ?></textarea>
        <br>

        <label for="foto" class="form-label">Foto Barang</label>
        <input <?= !isset($_GET['ubah']) ? 'required' : '' ?> type="file" name="foto" id="foto" class="area_txt" accept="image/*">
        <br>
        <br>
            <?php if (isset($_GET['ubah'])): ?>
                <button type="submit" name="aksi" value="edit" class="btn btn-blue">Input</button>
            <?php else: ?>
                <button type="submit" name="aksi" value="add" class="btn btn-blue">Input</button>
            <?php endif; ?>
            <a href="../page/barang.php" class="btn btn-red">Kembali</a>
    </form>
</div>

</body>
</html>
