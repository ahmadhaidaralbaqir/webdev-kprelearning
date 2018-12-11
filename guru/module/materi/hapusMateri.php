<?php 
	require_once '../../../config/koneksi.php';
	$kode_materi = $_POST["kode_materi"];
	$query = $koneksiDb->prepare("DELETE FROM `materi` WHERE `kode_materi` = '$kode_materi'");
	if($query->execute()){
		echo 1;
	}
 ?>