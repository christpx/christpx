<?php
require "function.php";
require "header.php";
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
    <div style = "margin:0px 200px 0px 200px">

        <h1>Table Poli Klinik</h1>
        <br>

    <a href="policreate.php" class="btn btn-outline-primary">Tambah Data</a>
    <br><br>


    <table border="1" cellpadding="10" cellspacing="0" class="table table-striped table-dark">

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
            <th><a href="poliupdate.php?id=<?= $a["idpoli"]; ?>" class="btn btn-primary">update</a>
            <a href="polidelete.php?id=<?= $a["idpoli"]; ?>" class="btn btn-danger">delete</a></th>
        </tr>
        <?php
        $b++;
    }
    ?>
    </table>
    </div>
</body>
</html>