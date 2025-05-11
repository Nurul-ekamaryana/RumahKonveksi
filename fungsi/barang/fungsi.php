<?php
    include '../../koneksi.php';

    function tambah_data($data, $files){

        $conn = $GLOBALS['conn'];

            $nama_barang =$data['nama_barang'];
            $harga =$data['harga'];
            $stok =$data['stok'];
            $deskripsi =$data['deskripsi'];

            $split = explode('.', $files['foto']['name']);
            $ekstensi = $split[count($split)-1];
            
            $foto = $nama_barang.'.'.$ekstensi;
            

            $id_kategori =$data['id_kategori'];

            $dir = "../../img/";
            $tmpFile = $files['foto']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$foto);

            $query = "INSERT INTO barang VALUES(null, '$nama_barang', '$harga', '$stok', '$deskripsi', '$foto', '$id_kategori')";
            $sql = mysqli_query($conn, $query);
            return true;
    }

    function ubah_data($data, $files){
        $conn = $GLOBALS['conn'];

        $id_barang = $data['id_barang'];
            $nama_barang =$data['nama_barang'];
            $harga =$data['harga'];
            $stok =$data['stok'];
            $deskripsi =$data['deskripsi'];
            // $foto = $files['foto']['name'];
            $id_kategori =$data['id_kategori'];

            $queryShow = "SELECT * FROM barang WHERE id_barang ='$id_barang'";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result =mysqli_fetch_assoc($sqlShow);

            if($files['foto']['name'] == ""){
                $foto = $result['foto'];
            }else{
                $split = explode('.', $files['foto']['name']);
                $ekstensi = $split[count($split)-1];

                $foto = $result['nama_barang'].'.'.$ekstensi; 
                unlink("../../img/".$result['foto']);
                move_uploaded_file($files['foto']['tmp_name'], '../../img/'.$foto);
            }
            $query = "UPDATE barang SET 
            nama_barang='$nama_barang',
            harga='$harga',
            stok='$stok',
            deskripsi='$deskripsi',
            foto='$foto',
            id_kategori='$id_kategori'
            WHERE id_barang='$id_barang'";

            $sql= mysqli_query($conn, $query);
            return true;
    }

    function hapus_data($data){
        $conn = $GLOBALS['conn'];
        $id_barang = $data['hapus'];
        $queryShow = "SELECT * FROM barang WHERE id_barang ='$id_barang'";
         $sqlShow = mysqli_query($conn, $queryShow);
         $result =mysqli_fetch_assoc($sqlShow);

        //  var_dump($result);

         unlink("../../img/".$result['foto']);

       $query = "DELETE FROM barang WHERE id_barang = '$id_barang'";
       $sql = mysqli_query($conn, $query);
        return true;
    }

?>