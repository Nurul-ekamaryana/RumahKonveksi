<?php
include '../../koneksi.php';

function tambah_data($data) {
    $conn = $GLOBALS['conn'];
    $nama_kategori = $data['nama_kategori'];

    // Perbaikan query: tanda titik koma dihilangkan dari dalam string SQL
    $query = "INSERT INTO kategori VALUES (NULL, '$nama_kategori')";
    $sql = mysqli_query($conn, $query);

    return true;
}

function ubah_data($data) {
    $conn = $GLOBALS['conn'];

    // Perbaikan typo: 'id$id_kategori' seharusnya 'id_kategori'
    $id_kategori = $data['id_kategori'];
    $nama_kategori = $data['nama_kategori'];

    // Perbaikan query: tidak boleh ada koma sebelum WHERE
    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";
    $sql = mysqli_query($conn, $query);

    return true;
}

function hapus_data($data) {
    $conn = $GLOBALS['conn'];
    $id_kategori = $data['hapus'];

    // Mengambil data sebelum dihapus (jika dibutuhkan)
    $queryShow = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
    $sql = mysqli_query($conn, $query);

    return true;
}
?>
