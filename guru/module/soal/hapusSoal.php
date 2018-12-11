<?php 
	require_once '../../../config/koneksi.php';

	$id_soal = $_POST["id_soal"];

	$query = $koneksiDb->prepare("DELETE FROM `soal` WHERE `id_soal` = '$id_soal'");
	if($query->execute()){
		echo 1;
	}
 ?>