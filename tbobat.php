<?php
require "function.php";

$data = query("SELECT * FROM tbobat");
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
    <h1>Table Obat</h1>
    <br>

    <a href="obatcreate.php">tambah tabel Poli Klinik</a>
    <br><br>


    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>no</th>
            <th>nama poli</th>
            <th>gedung</th>
            <th>aksi</th>
        </tr>

        <?php
        $b = 1;
        foreach($data as $a){
        ?>
        <tr>
            <th><?= $b; ?></th>
            <th><?= $a["namaobat"]; ?></th>
            <th><?= $a["ketobat"]; ?></th>
            <th><a href="obatupdate.php?id=<?= $a["idobat"]; ?>">update</a>|<a href="obatdelete.php?id=<?= $a["idobat"]; ?>">delete</a></th>
        </tr>
        <?php
        $b++;
        }
        ?>
    </table>
</body>
</html>