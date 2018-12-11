<?php 
    require_once '../../../config/koneksi.php';
    $kode_materi = $_POST["kode_materi"];
    $query = $koneksiDb->prepare("SELECT * FROM `materi` WHERE `kode_materi` = '$kode_materi' ");
    $query->execute();
    $data = $query->fetch(PDO::FETCH_LAZY);
    echo json_encode($data);
?>