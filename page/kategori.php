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
</head>
<body>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" 
           href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu">
           <i class="fa fa-bars"></i>
        </a>
        <a class="w3-bar-item w3-button w3-padding-large">KATEGORI BARANG</a>
    </div>
</div>

<!-- Judul -->
<div class="judul">
    <h1>Kategori Barang Rumah Konveksi</h1>
</div>

<!-- Tabel Kategori -->
<div style="overflow-x:auto; max-width:1300px; margin:auto;">
    <a class="tombol" href="">Kembali</a>
    <a class="tombol" href="../from/from_kategori.php">Tambah Data Baru</a>
    <br/><br/>

    <h3>Data Kategori</h3>
    <table id="myTable" class="display">
        <thead>
            <tr>
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
                        <a class="edit" href="../from/from_kategori.php?ubah=<?= $data['id_kategori']; ?>">Edit</a>
                        <a class="hapus" href="../fungsi/kategori/proses.php?hapus=<?= $data['id_kategori']; ?>" 
                        class="btn btn-danger mb-1"
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

</body>
</html>
