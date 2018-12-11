<?php 
    require_once '../../../config/koneksi.php';
    $nama_mapel = addslashes($_POST["nama_mapel"]);
    $query = $koneksiDb->prepare("INSERT INTO `mapel` (`kode_mapel`,`nama_mapel`)VALUES (NULL,'$nama_mapel')");
    if($query->execute()){
        echo "<script> window.location='../../index.php?mod=mapel&notif=ta,bah&status=5'</script>";
    }
?>