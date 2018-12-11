<?php
    require_once '../../../config/koneksi.php';
    $kode_kelas = $_POST["kode_kelas"];
    $query[] = "DELETE FROM `siswa` WHERE `kode_kelas` = '$kode_kelas' ";
    $query[] = "DELETE FROM `kelas` WHERE `kode_kelas` = '$kode_kelas' ";
    $query[] = "DELETE FROM `ulangan` WHERE `kode_kelas` = '$kode_kelas' ";
    $query[] = "DELETE FROM `ajar` WHERE `kode_kelas` = '$kode_kelas' ";
    
    foreach($query as $key => $value){
        $query = $koneksiDb->prepare($value);
        if($query->execute()){
            echo 1;
        }
    }

    
?>