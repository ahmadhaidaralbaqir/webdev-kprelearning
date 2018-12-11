<?php 
	require_once '../../../config/koneksi.php';
	$id_bab = $_POST["id_bab"];
	$nama_materi = addslashes(trim(htmlentities($_POST["nama_materi"])));
	$isi_materi = addslashes(trim(htmlentities($_POST["isi_materi"])));
	$nip = $_POST["nip"];
	$query = $koneksiDb->prepare("INSERT INTO `materi` (`kode_materi`,`nama_materi`,`isi_materi`,`id_bab`,`nip`) VALUES (null,'$nama_materi','$isi_materi','$id_bab','$nip')");
	if($query->execute()){
		echo 1;
	}
?>