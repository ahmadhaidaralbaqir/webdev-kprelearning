<?php 
    require_once '../../../config/koneksi.php';
    $kode_kelas = $_POST["kode_kelas"];
    $nama_kelas = $_POST["nama_kelas"];
    
    $query = $koneksiDb->prepare("UPDATE `kelas` SET `nama_kelas` = '$nama_kelas' WHERE `kode_kelas` = '$kode_kelas'");
    if($query->execute()){
        echo 1;
    }else{
    	echo 0;
    }
?>