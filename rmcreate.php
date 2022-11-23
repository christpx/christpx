<?php
require "function.php";

if(isset($_POST["button"])){

    if(rmcreate($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'tbrekammedis.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'tbrekammedis.php';
        </script>";
    }
}

$pasien = query("select * from tbpasien");
$dokter = query("select * from tbdok");
$poli = query("select * from tbpoliklinik");
?>

<h1>tambah tabel rekam medis</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">Id Rekam Medis : </label>
                <input type="text" name="idrm" id="id" required>
            </li>
            <li>
                <label for="nrp">Nama Pasien : </label>
                <select name="namapasien" id="nrp" required>
                    <?php foreach($pasien as $p){ ?>
                    <option value="<?= $p["namapasien"]; ?>"><?= $p["namapasien"]; ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="nama">Keluhan : </label>
                <input type="text" name="keluhan" id="nama" required>
            </li>
            <li>
                <label for="dok">Nama Dokter : </label>
                <select name="namadokter" id="dok" required>
                    <?php foreach($dokter as $d){ ?>
                    <option value="<?= $d["namadokter"]; ?>"><?= $d["namadokter"]; ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="dig">diagnosa : </label>
                <input type="text" name="diagnosa" id="dig" required>
            </li>
            <li>
                <label for="poli">Nama Poli : </label>
                <select name="namapoli" id="poli" required>
                    <?php foreach($poli as $po){ ?>
                    <option value="<?= $po["namapoli"]; ?>"><?= $po["namapoli"]; ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="tgl">tanggal periksa : </label>
                <input type="date" name="tglperiksa" id="tgl" required>
            </li>
            <li><button type="submit" name="button">submit</button></li>
        </ul>
    </form>