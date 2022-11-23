<?php
require "function.php";

$data = query("SELECT * FROM tbdok");
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
    <h1>Table Dokter</h1>
    <br>

    <a href="doktercreate.php">tambah tabel dokter</a>
    <br><br>


    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>no</th>
            <th>dokter</th>
            <th>spesialis</th>
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
            <th><?= $a["namadokter"]; ?></th>
            <th><?= $a["spesialis"]; ?></th>
            <th><?= $a["alamat"]; ?></th>
            <th><?= $a["notelp"]; ?></th>
            <th><a href="dokterupdate.php?id=<?= $a["iddokter"]; ?>">update</a>|<a href="dokterdelete.php?id=<?= $a["iddokter"]; ?>">delete</a></th>
        </tr>
        <?php
        $b++;
        }
        ?>
    </table>
</body>
</html>