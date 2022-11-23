<?php
require "function.php";

if(isset($_POST["button"])){
    if(obatcreate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'tbobat.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'tbobat.php';
        </script>";
    }
}
?>

<h1>tambah tabel obat</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">Id Obat : </label>
                <input type="text" name="idobat" id="id" required>
            </li>
            <li>
                <label for="nrp">Nama Obat : </label>
                <input type="text" name="namaobat" id="nrp" required >
            </li>
            <li>
                <label for="nama">Keterangan Obat : </label>
                <input type="text" name="ketobat" id="nama" required>
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>