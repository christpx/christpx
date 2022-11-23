<?php
require "function.php";

$id = $_GET["id"];

if(pasiendelete($id) > 0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href='tbpasien.php';
        </script>";
}
else{
    echo "<script>
            alert('data gagal dihapus');
            document.location.href='tbpasien.php';
        </script>";
}

?>