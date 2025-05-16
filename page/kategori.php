<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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


<!-- Tabel Kategori -->
<div class="table-container">
<h3>Kategori Barang</h3>
<div style="overflow-x:auto; max-width:1400px; margin:auto;">
    <a class="btn btn-red" href="../from/from_barang.php">Kembali</a>
    <a class="btn btn-blue" href="../from/from_kategori.php">Tambah Data Baru</a>
    <br/><br/>

    <table id="myTable">
        <thead>
            <tr class="w3-black">
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($conn, "SELECT * FROM kategori");
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                    <td>
                        <a class="btn btn-green" href="../from/from_kategori.php?ubah=<?= $data['id_kategori']; ?>">Edit</a>
                        <a class="btn btn-red" href="../fungsi/kategori/proses.php?hapus=<?= $data['id_kategori']; ?>" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- JQuery & DataTables (Jika digunakan) -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>


</div>
</body>
</html>
