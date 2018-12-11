<?php
    require_once '../../../config/koneksi.php';
    $kode_mapel = $_POST["kode_mapel"];
    $query = $koneksiDb->prepare("DELETE FROM `mapel` WHERE `kode_mapel` = '$kode_mapel'");
    if($query->execute()){
    	echo 1;
    }
?>