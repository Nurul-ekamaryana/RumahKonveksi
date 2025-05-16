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
<h3>Pesanan Kamu</h3>
<div style="overflow-x:auto; max-width:1400px; margin:auto;">
    <a class="btn btn-red" href="../page/barang.php">Kembali</a>
    <a class="btn btn-blue" href="../from/from_pesan.php">Tambah Data Baru</a>
    <br/><br/>

    <table id="myTable">
    <thead>
        <tr class="w3-black">
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Nama User</th>
            <th>Barang</th>
            <th>Rincian</th>
            <th>Total Harga</th>
            <th>Tanggal Pengambilan</th>
            <th>Status</th>
            <th>Waktu Dibuat</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $query_mysql = mysqli_query($conn, "SELECT 
            pesan.id_pesan,
            pesan.kode,
            user.nama AS nama_user,
            pesan.tgl_pengambilan,
            pesan.status,
            pesan.created_at,
            GROUP_CONCAT(barang.nama_barang SEPARATOR ', ') AS barang_list,
            GROUP_CONCAT(CONCAT('Rp ', FORMAT(barang.harga, 0), ' x ', detail_pesan.qty, ' = Rp ', FORMAT(detail_pesan.jumlah, 0)) SEPARATOR '<br>') AS detail_harga,
            SUM(detail_pesan.jumlah) AS total_jumlah
        FROM pesan
        JOIN user ON pesan.id_user = user.id_user
        JOIN detail_pesan ON pesan.id_pesan = detail_pesan.id_pesan
        JOIN barang ON detail_pesan.id_barang = barang.id_barang
        GROUP BY pesan.id_pesan
        ORDER BY pesan.created_at DESC
    ");
    

        $nomor = 1;
        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['kode']; ?></td>
            <td><?php echo $data['nama_user']; ?></td>
            <td><?php echo $data['barang_list']; ?></td>
            <td><?php echo $data['detail_harga']; ?></td>
            <td><?php echo $data['total_jumlah']; ?></td>
            <td><?php echo $data['tgl_pengambilan']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td><?php echo $data['created_at']; ?></td>
            <td>
                <!-- <a class="edit" href="../from/from_pesan.php?ubah=<?= $data['id_pesan']; ?>">Edit</a> -->
                <a class="btn btn-red" href="..?hapus=<?= $data['id_pesan']; ?>" 
                   onclick="return confirm('Apakah Anda yakin ingin Konfirmasi data ini?')">Hapus</a>
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
