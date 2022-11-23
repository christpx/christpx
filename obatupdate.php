<?php
require "function.php";

$id = $_GET["id"];
$data = query("SELECT * FROM tbobat WHERE idobat='$id'")[0];

if(isset($_POST["button"])){
    if(obatupdate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'tbobat.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'tbobat.php';
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
<h1>ubah tabel obat</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idobat" value="<?= $data["idobat"]; ?>">
        <ul>
            <li>
                <label for="nrp">Nama Obat : </label>
                <input type="text" name="namaobat" id="nrp" required value="<?= $data["namaobat"]; ?>">
            </li>
            <li>
                <label for="nrp">Keterangan Obat : </label>
                <input type="text" name="ketobat" id="nrp" required value="<?= $data["ketobat"]; ?>">
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>
</body>
</html>