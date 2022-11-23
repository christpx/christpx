<?php
require "function.php";

if(isset($_POST["button"])){
    if(pasiencreate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'tbpasien.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'tbpasien.php';
        </script>";
    }
}
?>

<h1>tambah tabel pasien</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">Id Pasien : </label>
                <input type="text" name="idpasien" id="id" required>
            </li>
            <li>
                <label for="nrp">Nomor Identitas : </label>
                <input type="text" name="nomoridentitas" id="nrp" required >
            </li>
            <li>
                <label for="nama">Nama Pasien : </label>
                <input type="text" name="namapasien" id="nama" required>
            </li>
            <li>
                <label for="nama">Jenis Kelamin : </label>
                <input type="text" name="jeniskelamin" id="nama" required>
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