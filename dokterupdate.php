<?php
require "function.php";

$id = $_GET["id"];
$data = query("SELECT * FROM tbdok WHERE iddokter='$id'")[0];

if(isset($_POST["button"])){
    if(dokterupdate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'tbdokter.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'tbdokter.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>ubah tabel dokter</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="iddokter" value="<?= $data["iddokter"]; ?>">
        <ul>
            <li>
                <label for="nrp">Nama Dokter : </label>
                <input type="text" name="namadokter" id="nrp" required value="<?= $data["namadokter"]; ?>">
            </li>
            <li>
                <label for="nama">Spesialis : </label>
                <input type="text" name="spesialis" id="nama" required value="<?= $data["spesialis"]; ?>">
            </li>
            <li>
                <label for="email">Alamat : </label>
                <input type="text" name="alamat" id="email" required value="<?= $data["alamat"]; ?>">
            </li>
            <li>
                <label for="jurusan">No Telp : </label>
                <input type="text" name="notelp" id="jurusan" required value="<?= $data["notelp"]; ?>">
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>
</body>
</html>