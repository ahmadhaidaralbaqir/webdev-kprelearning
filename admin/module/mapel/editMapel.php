<?php 
    require_once '../../../config/koneksi.php';
    $kode_mapel = $_POST["kode_mapel"];
    $nama_mapel = $_POST["nama_mapel"];

    $query = $koneksiDb->prepare("UPDATE `mapel` SET `nama_mapel` = '$nama_mapel' WHERE `kode_mapel` = '$kode_mapel'");
    if($query->execute()){
    	echo 1;
    }
?>