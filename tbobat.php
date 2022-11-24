<?php
require "function.php";
require "header.php";
$data = query("SELECT * FROM tbobat");

if(isset($_POST['cari'])){
    $data = searchobat($_POST['keyword']);
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
    <div style = "margin:0px 200px 0px 200px">


        <h1>Table Obat</h1>
    <br>
    <form action="" method="post" class="black">
        <input type="text" name="keyword" autofocus placeholder="cari data" autocomoplete="off" class="searchbar black">
        <button for="keyword" name="cari" class="btn btn-dark">Cari!</button>
    </form>

    <a href="obatcreate.php" class="btn btn-outline-primary">Tambah Data</a>
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
            <th><?= $a["namaobat"]; ?></th>
            <th><?= $a["ketobat"]; ?></th>
            <th><a href="obatupdate.php?id=<?= $a["idobat"]; ?>" class="btn btn-primary">update</a>
            <a href="obatdelete.php?id=<?= $a["idobat"]; ?>" class="btn btn-danger">delete</a></th>
        </tr>
        <?php
        $b++;
    }
    ?>
    </table>
</div>
</body>
</html>