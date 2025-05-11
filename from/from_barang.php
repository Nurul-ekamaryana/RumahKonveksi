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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large">BARANG</a>
    </div>
</div>

<!-- Form -->
<div class="form-container">
    <form method="POST" action="../fungsi/barang/proses.php" enctype="multipart/form-data">
        <input type="hidden" name="id_barang" value="<?= $id_barang ?>">

        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input required type="text" name="nama_barang" id="nama_barang" class="w3-input w3-border" placeholder="ex: Buket Bunga" value="<?= $nama_barang ?>">
        <br>

        <label for="harga_barang" class="form-label">Harga</label>
        <input required type="number" name="harga" id="harga_barang" class="w3-input w3-border" placeholder="ex: 10000" value="<?= $harga ?>">
        <br>
        
        <label for="stok_barang" class="form-label">Stok</label>
        <input required type="number" name="stok" id="stok_barang" class="w3-input w3-border" placeholder="ex: 10" value="<?= $stok ?>">
        <br>

        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea required name="deskripsi" id="deskripsi" class="w3-input w3-border" rows="3"><?= $deskripsi ?></textarea>
        <br>

        <label for="foto" class="form-label">Foto Barang</label>
        <input <?= !isset($_GET['ubah']) ? 'required' : '' ?> type="file" name="foto" id="foto" class="w3-input w3-border" accept="image/*">
        <br>

        <label for="id_kategori" class="form-label">Kategori Barang</label>
        <select required name="id_kategori" id="id_kategori" class="w3-input w3-border">
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
        <br>
            <?php if (isset($_GET['ubah'])): ?>
                <button type="submit" name="aksi" value="edit" class="w3-button w3-blue w3-margin-right">Simpan Perubahan</button>
            <?php else: ?>
                <button type="submit" name="aksi" value="add" class="w3-button w3-blue w3-margin-right">Input</button>
            <?php endif; ?>
            <a href="../page/barang.php" class="w3-button w3-red">Kembali</a>
    
    </form>
</div>

</body>
</html>
