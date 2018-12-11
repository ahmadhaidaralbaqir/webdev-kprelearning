<?php
    require_once '../../../config/koneksi.php';
    $id_bab = $_POST["id_bab"];
    $query = $koneksiDb->prepare("DELETE FROM `bab` WHERE `id_bab` = '$id_bab'");
    if($query->execute()){
        echo 1;
    }else{
        echo 0;
    }
?>