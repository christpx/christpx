<?php
require "function.php";

$data = query("SELECT * FROM tbpasien");
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
    <h1>Table Pasien</h1>
    <br>

    <a href="pasiencreate.php">tambah tabel pasien</a>
    <br><br>


    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>no</th>
            <th>nomor identitas</th>
            <th>nama pasien</th>
            <th>jeniskelamin</th>
            <th>alamat</th>
            <th>no telp</th>
            <th>aksi</th>
        </tr>

        <?php
        $b = 1;
        foreach($data as $a){
        ?>
        <tr>
            <th><?= $b; ?></th>
            <th><?= $a["nomoridentitas"]; ?></th>
            <th><?= $a["namapasien"]; ?></th>
            <th><?= $a["jeniskelamin"]; ?></th>
            <th><?= $a["alamat"]; ?></th>
            <th><?= $a["notelp"]; ?></th>
            <th><a href="pasienupdate.php?id=<?= $a["idpasien"]; ?>">update</a>|<a href="pasiendelete.php?id=<?= $a["idpasien"]; ?>">delete</a></th>
        </tr>
        <?php
        $b++;
        }
        ?>
    </table>
</body>
</html>