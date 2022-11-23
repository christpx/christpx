<?php
require "function.php";

$data = query("SELECT * FROM tbrekammedis
INNER JOIN tbpasien
ON tbrekammedis.idpasien = tbpasien.idpasien 
INNER JOIN tbdok 
ON tbrekammedis.iddokter = tbdok.iddokter 
INNER JOIN tbpoliklinik 
ON tbrekammedis.idpoli = tbpoliklinik.idpoli");
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
    <a href="index.php">back</a>
    <h1>Table Poli Klinik</h1>
    <br>

    <a href="rmcreate.php">tambah tabel Poli Klinik</a>
    <br><br>


    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>no</th>
            <th>nama pasien</th>
            <th>keluhan</th>
            <th>nama dokter</th>
            <th>diagnosa</th>
            <th>nama poli</th>
            <th>gedung</th>
            <th>tanggal periksa</th>
            <th>aksi</th>
        </tr>

        <?php
        $b = 1;
        foreach($data as $a){
        ?>
        <tr>
            <th><?= $b; ?></th>
            <th><?= $a["namapasien"]; ?></th>
            <th><?= $a["keluhan"]; ?></th>
            <th><?= $a["namadokter"]; ?></th>
            <th><?= $a["diagnosa"]; ?></th>
            <th><?= $a["namapoli"]; ?></th>
            <th><?= $a["gedung"]; ?></th>
            <th><?= $a["tglperiksa"]; ?></th>
            <th><a href="rmupdate.php?id=<?= $a["idpoli"]; ?>">update</a>|<a href="rmdelete.php?id=<?= $a["idpoli"]; ?>">delete</a></th>
        </tr>
        <?php
        $b++;
        }
        ?>
    </table>
</body>
</html>