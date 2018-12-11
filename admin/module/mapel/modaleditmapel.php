<?php
    require_once '../../../config/koneksi.php';
    $kode_mapel = $_POST["kode_mapel"];
    $query = $koneksiDb->prepare("SELECT * FROM `mapel` WHERE `kode_mapel` = '$kode_mapel'");
    $query->execute();
    $data = $query->fetch(PDO::FETCH_LAZY);
    echo json_encode($data);
?>
