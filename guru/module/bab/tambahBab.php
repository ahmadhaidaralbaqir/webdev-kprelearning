<?php
    require_once '../../../config/koneksi.php';
    $nip = $_POST["nip"];
    $namaBab = $_POST["namaBab"];
    $kodeKelas = $_POST["kodeKelas"];
    $query = $koneksiDb->prepare("INSERT INTO `bab` (`id_bab`,`nama`,`nip`,`kode_kelas`)VALUES(null,'$namaBab','$nip','$kodeKelas')");
    if($query->execute()){
        echo 1;
    }else{
        echo 0;
    }
    
?>