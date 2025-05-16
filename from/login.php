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
      if (isset($_POST['nama'])) {
          $nama = $_POST['nama'];
          $password = md5($_POST['password']);
      
          $query = mysqli_query($conn, "SELECT * FROM user WHERE nama='$nama' AND password='$password';");
      
          if (mysqli_num_rows($query) > 0) {
              $data = mysqli_fetch_array($query);
              $_SESSION['user'] = $data;
              echo "<script>alert('Selamat datang, {$data['nama']}'); location.href='../page/barang.php';</script>";
              exit();
          } else {
              echo "<script>alert('nama atau password salah');</script>";
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
            <input required type="password" name="password" id="password" class="form-input" placeholder="Masukkan password">

            <button type="submit" class="login-button">Login</button>
            <br>
            <br>
            <hr>
            <br>
            <a href="register.php" style="display: block; text-align: center; color: blue;">Buat Akun</a>
        </form>
    </div>
</body>
</html>
