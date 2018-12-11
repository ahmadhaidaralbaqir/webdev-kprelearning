<?php 
	require_once '../../../config/koneksi.php';
	$id_ulangan = $_POST["id_ulangan"];
	$query = $koneksiDb->prepare("DELETE FROM `ulangan` WHERE `id_ulangan` = '$id_ulangan'");
	if($query->execute()){
		echo 1;
	}
 ?>