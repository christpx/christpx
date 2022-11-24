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
    if(rmupdate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'tbrekammedis.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'tbrekammedis.php';
        </script>";
    }
}
$pasien = query("select * from tbpasien");
$dokter = query("select * from tbdok");
$poli = query("select * from tbpoliklinik");
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
                <label for="nrp">Id rekammedis : </label>
                <input type="text" name="idrm" id="nrp" required value="<?= $data["idrm"]; ?>">
            </li>
            <li>
                <label for="namapasien">Nama pasien : </label>
                <select name="namapasien" id="namapasien">
                    <?php foreach($pasien as $p){ ?>
                    <option value="<?= $p["namapasien"]; ?>"><?= $p["namapasien"]; ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="keluhan">Keluhan : </label>
                <input type="text" name="keluhan" id="keluhan" required value="<?= $data['keluhan'];?>">
            </li>
            <li>
                <label for="namadokter">Nama dokter : </label>
                <select name="namadokter" id="namadokter">
                <?php foreach($dokter as $d){ ?>
                    <option value="<?= $d["namadokter"]; ?>"><?= $d["namadokter"]; ?></option>
                    <?php } ?>

                </select>
            </li>
            <li>
                <label for="diagnosa">Diagnosa : </label>
                <input type="text" name="diagnosa" id="diagnosa" required value="<?= $data['diagnosa'];?>">
            </li>
            <li>
                <label for="namapoli">Nama Poli : </label>
                <select name="namapoli" id="namapoli">
                    <?php foreach($poli as $po){ ?>
                        <option value="<?= $po["namapoli"]; ?>"><?= $po["namapoli"]; ?></option>
                        <?php } ?>
                </select>
            </li>
            <li>
                <label for="tanggal">Tanggal : </label>
                <input type="date" id="tanggal" name="tglperiksa" required value="<?= $data['tglperiksa'];?>">
            </li>

            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>
</body>
</html>