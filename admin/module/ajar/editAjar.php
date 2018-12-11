<?php 
    require_once "../../../config/koneksi.php"; //memanggil file koneksi 
    $id_ajar  = $_POST["id_ajar"];
    $nip = $_POST["nip"];
    $kode_kelas = $_POST["kode_kelas"];
    $kode_mapel = $_POST["kode_mapel"];
    $tahun_ajaran = $_POST["tahun_ajaran"];
    $query = $koneksiDb->prepare("UPDATE `ajar` SET `nip` = '$nip', `kode_kelas` = '$kode_kelas', `kode_mapel` = '$kode_mapel', `tahun_ajaran` = '$tahun_ajaran' WHERE `id_ajar` = '$id_ajar'");
    if($query->execute()){
        echo 1;
    }
?>