<?php 
    require_once '../../../config/koneksi.php';
    $id_bab = $_POST["id_bab"];
    $nama_bab = $_POST["nama_bab"];
    $kode_kelas = $_POST["kode_kelas"];
    $query = $koneksiDb->prepare("UPDATE `bab` SET `nama` = '$nama_bab',`kode_kelas` = '$kode_kelas' WHERE `id_bab` = '$id_bab'");
    if($query->execute()){
    	echo 1;
    }
?>