<?php
include '../../koneksi.php';

function tambah_data($data) {
    $conn = $GLOBALS['conn'];
    $nama = $data['nama'];
    $password = md5($data['password']);
    $no_telp = $data['no_telp'];
    $alamat = $data['alamat'];

    // Perbaikan query: tanda titik koma dihilangkan dari dalam string SQL
    $query = "INSERT INTO user VALUES (NULL, '$nama','$password','$no_telp','$alamat','admin')";
    $sql = mysqli_query($conn, $query);

    return true;
}

function ubah_data($data) {
    $conn = $GLOBALS['conn'];

    // Perbaikan typo: 'id$id_kategori' seharusnya 'id_kategori'
    $id_user = $data['id_user'];
    $nama = $data['nama'];
    $password = md5($data['password']);
    $no_telp = $data['no_telp'];
    $alamat = $data['alamat'];

    // Perbaikan query: tidak boleh ada koma sebelum WHERE
    $query = "UPDATE user SET nama = '$nama', password = '$password', no_telp = '$no_telp', alamat = '$alamat' WHERE id_user = '$id_user'";
    $sql = mysqli_query($conn, $query);

    return true;
}

function hapus_data($data) {
    $conn = $GLOBALS['conn'];
    $id_user = $data['hapus'];

    // Mengambil data sebelum dihapus (jika dibutuhkan)
    $queryShow = "SELECT * FROM user WHERE id_user = '$id_user'";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "DELETE FROM user WHERE id_user = '$id_user'";
    $sql = mysqli_query($conn, $query);

    return true;
}
?>
