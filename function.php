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

    $query = "UPDATE tbrekammedis SET
                idrm ='$id',
                idpasien='$pasien',
                keluhan='$keluhan',
                iddokter = '$dokter',
                diagnosa = '$diagnosa',
                idpoli = '$poli',
                tglperiksa = '$tglperiksa'
                 WHERE idrm='$id';
    ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);





}

function rmdelete($id){
    global $db;

    mysqli_query($db,"DELETE FROM tbrekammedis WHERE idrm='$id'");

    return mysqli_affected_rows($db);
}


function search($keyword){
    global $db;

    $query = "SELECT * FROM tbdok WHERE iddokter LIKE '%$keyword%' OR
    namadokter LIKE '%$keyword%' OR
    spesialis LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    notelp LIKE '%$keyword%'
    ";

    return query($query);
}

function searchobat($keyword){
    global $db;

    $query = "SELECT * FROM tbobat WHERE idobat LIKE '%$keyword%' OR
    namaobat LIKE '%$keyword%' OR
    ketobat LIKE '%$keyword%'
    ";

    return query($query);
}
function searchpasien($keyword){
    global $db;

    $query = "SELECT * FROM tbpasien WHERE idpasien  LIKE '%$keyword%' OR
    nomoridentitas LIKE '%$keyword%' OR
    namapasien LIKE '%$keyword%' OR
    jeniskelamin LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    notelp LIKE '%$keyword%'
    ";

    return query($query);
}

function searchpoli($keyword){
    global $db;

    $query = "SELECT * FROM tbpoliklinik WHERE idpoli LIKE '%$keyword%' OR
    namapoli LIKE '%$keyword%' OR
    gedung LIKE '%$keyword%' 
    ";

    return query($query);
}

function searchrm($keyword){
    global $db;

    $query = "SELECT * FROM tbrekammedis
    INNER JOIN tbpasien
    ON tbrekammedis.idpasien = tbpasien.idpasien 
    INNER JOIN tbdok 
    ON tbrekammedis.iddokter = tbdok.iddokter 
    INNER JOIN tbpoliklinik 
    ON tbrekammedis.idpoli = tbpoliklinik.idpoli
     WHERE
    namadokter LIKE '%$keyword%' OR
    namapasien LIKE '%$keyword%' OR
    keluhan LIKE '%$keyword%' OR
    diagnosa LIKE '%$keyword%' OR
    namapoli LIKE '%$keyword%' OR
    gedung LIKE '%$keyword%' OR
    tglperiksa LIKE '%$keyword%'
    ";

    return query($query);

    // return var_dump($query);
}

?>