<?php
    require_once '../../../config/koneksi.php';
    if(isset($_POST["kode_kelas"]))
    {
        $query = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$_POST[kode_kelas]'");
        $query->execute();
        $data = $query->fetch(PDO::FETCH_LAZY);
        echo json_encode($data);
    }
 ?>