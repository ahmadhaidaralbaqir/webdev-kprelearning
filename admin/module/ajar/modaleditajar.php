<?php
    require_once '../../../config/koneksi.php';
    $id_ajar = $_POST["id_ajar"];
    $query = $koneksiDb->prepare("SELECT * FROM `ajar` WHERE `id_ajar` = '$id_ajar'");
    $query->execute();
    $data = $query->fetch(PDO::FETCH_LAZY);
    echo json_encode($data);
?>
