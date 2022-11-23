<?php
require "function.php";

$id = $_GET["id"];
$data = query("SELECT * FROM tbrekammedis
INNER JOIN tbpasien
ON tbrekammedis.idpasien = tbpasien.idpasien 
INNER JOIN tbdok 
ON tbrekammedis.iddokter = tbdok.iddokter 
INNER JOIN tbpoliklinik 
ON tbrekammedis.idpoli = tbpoliklinik.idpoli
WHERE idrm = '$id'")[0];

if(isset($_POST["button"])){
    if(poliupdate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'tbpoli.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'tbpoli.php';
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
<h1>ubah tabel poli</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idpoli" value="<?= $data["idpoli"]; ?>">
        <ul>
            <li>
                <label for="nrp">Nama Poli : </label>
                <input type="text" name="namapoli" id="nrp" required value="<?= $data["namapoli"]; ?>">
            </li>
            <li>
                <label for="nrp">Gedung : </label>
                <input type="text" name="gedung" id="nrp" required value="<?= $data["gedung"]; ?>">
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>
</body>
</html>