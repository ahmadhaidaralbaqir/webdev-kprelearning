<?php
    require_once "../../../config/koneksi.php";
    $nama_kelas = addslashes($_POST["nama_kelas"]);
    
    $query = $koneksiDb->prepare("INSERT INTO `kelas` (`kode_kelas`,`nama_kelas`)VALUES(NULL,'$nama_kelas')");
    if($query->execute()){
        echo "<script> window.location='../../index.php?mod=kelas&notif=tambah&status=3'</script>";
    }
?>