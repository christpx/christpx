<?php
require "function.php";

$id = $_GET["id"];

if(rmdelete($id) > 0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href='tbrekammedis.php';
        </script>";
}
else{
    echo "<script>
            alert('data gagal dihapus');
            document.location.href='tbrekammedis.php';
        </script>";
}

?>