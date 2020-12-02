<?php
include("config.php");

$id = $_GET['id_tamu'];

$query = "DELETE FROM tamu WHERE id_tamu = '$id'";

if($hotel->query($query)){
    header("Location:final.php");
}
else {
    echo "Data Gagal Dihapus";
}

?>
