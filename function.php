<?php
$db = mysqli_connect("localhost", "root", "", "rumahsakit");

function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function doktercreate($data){
    global $db;

    $id = $data["iddokter"];
    $namadokter = htmlspecialchars($data["namadokter"]);
    $spesialis = htmlspecialchars($data["spesialis"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = htmlspecialchars($data["notelp"]);

    $query = "INSERT INTO tbdok VALUES ('$id', '$namadokter', '$spesialis', '$alamat', '$notelp')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function dokterupdate($data){
    global $db;

    $id = $data["iddokter"];
    $namadokter = htmlspecialchars($data["namadokter"]);
    $spesialis = htmlspecialchars($data["spesialis"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = htmlspecialchars($data["notelp"]);

    $query = "UPDATE tbdok SET
                iddokter ='$id',
                namadokter='$namadokter',
                spesialis='$spesialis',
                alamat='$alamat',
                notelp='$notelp' WHERE iddokter='$id';
    ";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function dokterdelete($id){
    global $db;

    mysqli_query($db,"DELETE FROM tbdok WHERE iddokter='$id'");

    return mysqli_affected_rows($db);
}

function pasiencreate($data){
    global $db;

    $id = $data["idpasien"];
    $nomoridentitas = htmlspecialchars($data["nomoridentitas"]);
    $namapasien = htmlspecialchars($data["namapasien"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = htmlspecialchars($data["notelp"]);

    $query = "INSERT INTO tbpasien VALUES ('$id','$nomoridentitas', '$namapasien', '$jeniskelamin', '$alamat', '$notelp')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function pasienupdate($data){
    global $db;

    $id = $data["idpasien"];
    $nomoridentitas = htmlspecialchars($data["nomoridentitas"]);
    $namapasien = htmlspecialchars($data["namapasien"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = htmlspecialchars($data["notelp"]);

    $query = "UPDATE tbpasien SET
                idpasien ='$id',
                nomoridentitas='$nomoridentitas',
                namapasien='$namapasien',
                jeniskelamin='$jeniskelamin',
                alamat='$alamat',
                notelp='$notelp' WHERE idpasien='$id';
    ";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function pasiendelete($id){
    global $db;

    mysqli_query($db,"DELETE FROM tbpasien WHERE idpasien='$id'");

    return mysqli_affected_rows($db);
}

function policreate($data){
    global $db;

    $id = $data["idpoli"];
    $namapoli = htmlspecialchars($data["namapoli"]);
    $gedung = htmlspecialchars($data["gedung"]);

    $query = "INSERT INTO tbpoliklinik VALUES ('$id','$namapoli', '$gedung')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function poliupdate($data){
    global $db;

    $id = $data["idpoli"];
    $namapoli = htmlspecialchars($data["namapoli"]);
    $gedung = htmlspecialchars($data["gedung"]);

    $query = "UPDATE tbpoliklinik SET
                idpoli ='$id',
                namapoli='$namapoli',
                gedung='$gedung' WHERE idpoli='$id';
    ";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function polidelete($id){
    global $db;

    mysqli_query($db,"DELETE FROM tbpoliklinik WHERE idpoli='$id'");

    return mysqli_affected_rows($db);
}

function obatcreate($data){
    global $db;

    $id = $data["idobat"];
    $namaobat = htmlspecialchars($data["namaobat"]);
    $ketobat = htmlspecialchars($data["ketobat"]);

    $query = "INSERT INTO tbobat VALUES ('$id','$namaobat', '$ketobat')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function obatupdate($data){
    global $db;

    $id = $data["idobat"];
    $namaobat = htmlspecialchars($data["namaobat"]);
    $ketobat = htmlspecialchars($data["ketobat"]);

    $query = "UPDATE tbobat SET
                idobat ='$id',
                namaobat='$namaobat',
                ketobat='$ketobat' WHERE idobat='$id';
    ";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function obatdelete($id){
    global $db;

    mysqli_query($db,"DELETE FROM tbobat WHERE idobat='$id'");

    return mysqli_affected_rows($db);
}

function rmcreate($data){
    global $db;

    $id = $data["idrm"];
    $namapasien = $data["namapasien"];
    $keluhan = htmlspecialchars($data["keluhan"]);
    $namadokter = $data["namadokter"];
    $diagnosa = $data["diagnosa"];
    $namapoli = $data["namapoli"];
    $tglperiksa = $data["tglperiksa"];

    $pasien = query("SELECT idpasien FROM tbpasien WHERE namapasien = '$namapasien'")[0]["idpasien"];
    $dokter = query("SELECT iddokter FROM tbdok WHERE namadokter = '$namadokter'")[0]["iddokter"];
    $poli = query("SELECT idpoli FROM tbpoliklinik WHERE namapoli = '$namapoli'")[0]["idpoli"];

    $query = "INSERT INTO tbrekammedis VALUES ('$id','$pasien', '$keluhan', '$dokter','$diagnosa', '$poli', '$tglperiksa')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function rmupdate($data){


}

function rmdelete($id){
    global $db;

    mysqli_query($db,"DELETE FROM tbrekammedis WHERE idrm='$id'");

    return mysqli_affected_rows($db);
}
?>