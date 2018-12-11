<?php 
    require_once "../../../config/koneksi.php"; //memanggil file koneksi d
    $nip = $_POST["nip"];
    $kode_kelas = $_POST["kode_kelas"];
    $kode_mapel = $_POST["kode_mapel"];
    $tahun_ajaran = $_POST["tahun_ajaran"];
    $query = $koneksiDb->prepare("INSERT INTO `ajar` (`id_ajar`,`nip`,`kode_kelas`,`kode_mapel`,`tahun_ajaran`)VALUES(NULL,'$nip','$kode_kelas','$kode_mapel','$tahun_ajaran')");
    if($query->execute()){
        echo "<script>window.location='../../index.php?mod=ajar&notif=tambah&status=1'</script>";
    }
    
?>