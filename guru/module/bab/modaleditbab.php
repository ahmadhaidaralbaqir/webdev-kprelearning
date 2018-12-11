<?php 
    require_once '../../../config/koneksi.php';
    $id_bab = $_POST["id_bab"];
    $query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `id_bab` = '$id_bab' ");
    $query->execute();
    $data = $query->fetch(PDO::FETCH_LAZY);
    echo json_encode($data);
?>