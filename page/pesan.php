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
<h3>Pesanan Kamu</h3>
<div style="overflow-x:auto; max-width:1400px; margin:auto;">
    <a class="tombol" href="../from/from_barang.php">Kembali</a>
    <a class="tombol" href="../from/from_pesan.php">Tambah Data Baru</a>
    <br/><br/>

    <table id="myTable" class="display">
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
                <a class="hapus" href="..?hapus=<?= $data['id_pesan']; ?>" 
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
