<?php
session_start();
include '../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css"> <!-- Pastikan path-nya sesuai -->
</head>
<body class="btn-blue">
    <?php 

    if(isset($_POST['nama'])){
        $nama = $_POST['nama'];
        $password = md5($_POST['password']);
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $query = mysqli_query($conn, "INSERT INTO user (nama, password, no_telp, alamat, role) VALUES ('$nama','$password','$no_telp','$alamat','pelanggan');");
        if($query){
            echo'<script>alert("BERHASIL SILAHKAN LOGIN")</script>';
        }else{
            echo'<script>alert("GAGAL")</script>';
        }
    }

    ?>
    <div class="log">
        <center><h2 class="text-section">Haloo,</h2>
        <h3>datapkan pengalan menyenangkan</h3></center>
            <form method="post">
                <label for="nama" class="form-label">Nama/Username</label>
                <input required type="text" name="nama" id="nama" class="form-input" placeholder="Masukkan nama">

                <label for="password" class="form-label">Password</label>
                <input required type="text" name="password" id="password" class="form-input" placeholder="Masukkan password">
                
                <label for="no_telp" class="form-label">No Telp</label>
                <input required type="text" name="no_telp" id="no_telp" class="form-input" placeholder="Masukkan No Telp">

                <label for="alamat" class="form-label">Alamat</label>
                <input required type="text" name="alamat" id="alamat" class="form-input" placeholder="Masukkan Alamat">

                <button type="submit" class="login-button">Buat Akun</button>
                            <br>
                <br>
                <hr>
                <br>
                <a href="login.php" style="display: block; text-align: center;">Login Now</a>
            </form>
    </div>
</body>
</html>
