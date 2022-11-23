<?php
require "function.php";

if(isset($_POST["button"])){
    if(policreate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'tbpoli.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'tbpoli.php';
        </script>";
    }
}
?>

<h1>tambah tabel poli klinik</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">Id Poli : </label>
                <input type="text" name="idpoli" id="id" required>
            </li>
            <li>
                <label for="nrp">Nama Poli : </label>
                <input type="text" name="namapoli" id="nrp" required >
            </li>
            <li>
                <label for="nama">Gedung : </label>
                <input type="text" name="gedung" id="nama" required>
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>