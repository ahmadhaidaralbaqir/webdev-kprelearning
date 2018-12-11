<?php
	require_once '../../../config/koneksi.php';
	$id_ulangan = $_POST["id_ulangan"];

	$query = $koneksiDb->prepare("UPDATE `ulangan` SET `status_ulangan` = '1' WHERE `id_ulangan` = '$id_ulangan'");
	if($query->execute()){
		echo 1;
	}
 ?>