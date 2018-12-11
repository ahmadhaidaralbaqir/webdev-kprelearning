<?php 
    require_once '../../../config/koneksi.php';
    $id_ulangan = $_POST["id_ulangan"];
    $query = $koneksiDb->prepare("SELECT * FROM `ulangan` WHERE `id_ulangan` = '$id_ulangan' ");
    $query->execute();
    $data = $query->fetch(PDO::FETCH_LAZY);
    echo json_encode($data);
?>