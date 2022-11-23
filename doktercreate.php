<?php
require "function.php";

if(isset($_POST["button"])){
    if(doktercreate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'tbdokter.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'tbdokter.php';
        </script>";
    }
}
?>

<h1>tambah tabel dokter</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">Id Dokter : </label>
                <input type="text" name="iddokter" id="id" required>
            </li>
            <li>
                <label for="nrp">Nama Dokter : </label>
                <input type="text" name="namadokter" id="nrp" required >
            </li>
            <li>
                <label for="nama">Spesialis : </label>
                <input type="text" name="spesialis" id="nama" required>
            </li>
            <li>
                <label for="email">Alamat : </label>
                <input type="text" name="alamat" id="email" required>
            </li>
            <li>
                <label for="jurusan">No Telp : </label>
                <input type="text" name="notelp" id="jurusan">
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>