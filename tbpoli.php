<?php
require "function.php";

$data = query("SELECT * FROM tbpoliklinik");
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

    <a href="policreate.php">tambah tabel Poli Klinik</a>
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
            <th><?= $a["namapoli"]; ?></th>
            <th><?= $a["gedung"]; ?></th>
            <th><a href="poliupdate.php?id=<?= $a["idpoli"]; ?>">update</a>|<a href="polidelete.php?id=<?= $a["idpoli"]; ?>">delete</a></th>
        </tr>
        <?php
        $b++;
        }
        ?>
    </table>
</body>
</html>