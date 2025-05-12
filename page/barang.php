<?php
    include '../koneksi.php';

    // Menggabungkan data barang dengan nama kategori
    $query = "SELECT barang.*, kategori.nama_kategori 
              FROM barang 
              JOIN kategori ON barang.id_kategori = kategori.id_kategori;";

    $sql = mysqli_query($conn, $query);
    $no = 0;
?>'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>W3.CSS Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <style>
    .table-container {
        max-width: 1300px;
        margin: auto;
        background-color: white;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    </style>
</head>
<body>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" 
           href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu">
           <i class="fa fa-bars"></i>
        </a>
        <a class="w3-bar-item w3-button w3-padding-large">BARANG</a>
    </div>
</div>

<div class="judul">
    input
</div>

<!-- Tabel Kategori -->
<div class="table-container">
<h3>Data Barang</h3>
<div style="overflow-x:auto; max-width:1400px; margin:auto;">
    <a class="tombol" href="">Kembali</a>
    <a class="tombol" href="../from/from_barang.php">Tambah Data Baru</a>
    <a class="tombol" href="pesan.php">Buat pesanan</a>
    <br/><br/>

    <table id="myTable" class="display">
        <thead>
            <tr class="w3-black">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($conn, "SELECT * FROM kategori");
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
             <?php while($result = mysqli_fetch_assoc($sql)) { ?>
                    <tr>
                        <td><?= ++$no; ?></td>
                        <td><?= $result['nama_barang']; ?></td>
                        <td><?= $result['harga']; ?></td>
                        <td><?= $result['stok']; ?></td>
                        <td><?= $result['deskripsi']; ?></td>
                        <td><?= $result['nama_kategori']; ?></td>
                        <td>
                            <img src="../img/<?= $result['foto']; ?>" style="width:100px;" alt="foto barang">
                        </td>
                        <td>
                            <a href="../fungsi/barang/proses.php?hapus=<?= $result['id_barang']; ?>" 
                            class="hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            
                            <a href="../from/from_barang.php?ubah=<?= $result['id_barang']; ?>" 
                            class="edit">Edit</a>
                        </td>
                    </tr>
                    <?php } ?>
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
