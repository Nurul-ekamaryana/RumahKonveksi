<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../from/login.php');
    exit();
}

include '../koneksi.php';

$nama_user = $_SESSION['user']['nama'];
$role = $_SESSION['user']['role'];

// Ambil data barang dan kategori
$query = "SELECT barang.*, kategori.nama_kategori 
          FROM barang 
          JOIN kategori ON barang.id_kategori = kategori.id_kategori";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="brand">WELCOME, <?= htmlspecialchars($nama_user); ?></div>
    <ul>
        <a href="../fungsi/logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
    </ul>
</nav>

<!-- Tabel Barang -->
<div class="table-container">
    <h3>Data Barang</h3>
    <div style="overflow-x:auto; max-width:1400px; margin:auto;">
        <?php if ($role === 'admin'): ?>
            <a class="btn btn-blue" href="../from/from_barang.php">Tambah Data Baru</a>
            <a class="btn btn-green" href="user.php">Tambah Pegawai</a>
        <?php else: ?>
            <a class="btn btn-green" href="pesan.php">Buat Pesanan</a>
        <?php endif; ?>
        <br/><br/>

        <table id="myTable">
            <thead>
                <tr class="w3-black">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Foto</th>
                    <?php if ($role === 'admin'): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($result = mysqli_fetch_assoc($sql)): ?>
                    <tr>
                        <td><?= ++$no; ?></td>
                        <td><?= htmlspecialchars($result['nama_barang']); ?></td>
                        <td><?= htmlspecialchars($result['harga']); ?></td>
                        <td><?= htmlspecialchars($result['stok']); ?></td>
                        <td><?= htmlspecialchars($result['deskripsi']); ?></td>
                        <td><?= htmlspecialchars($result['nama_kategori']); ?></td>
                        <td>
                            <img src="../img/<?= htmlspecialchars($result['foto']); ?>" style="width:100px;" alt="foto barang">
                        </td>
                        <?php if ($role === 'admin'): ?>
                            <td>
                                <a href="../fungsi/barang/proses.php?hapus=<?= $result['id_barang']; ?>" 
                                   class="btn btn-red"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                <a href="../from/from_barang.php?ubah=<?= $result['id_barang']; ?>" 
                                   class="btn btn-green">Edit</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

</body>
</html>
