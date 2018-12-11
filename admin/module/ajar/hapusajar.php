<?php
    require_once "../../../config/koneksi.php";
    $id_ajar = $_POST["id_ajar"];
    $query = $koneksiDb->prepare("DELETE FROM ajar WHERE id_ajar = '$id_ajar'");
    if($query->execute()){
    	echo 1;
    }
?>