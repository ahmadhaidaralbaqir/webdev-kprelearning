<?php 
	require_once '../../../config/koneksi.php';
	$id_ulangan     = $_POST["id_ulangan"];
	$id_bab         = $_POST["id_bab"];
	$tgl_ulangan    = $_POST["tgl_ulangan"];
	$durasi_ulangan = $_POST["durasi_ulangan"];
	$jenis_ulangan  = $_POST["jenis_ulangan"];
	$query = $koneksiDb->prepare("UPDATE `ulangan` SET `tgl_ulangan` = '$tgl_ulangan',`jenis_ulangan` = '$jenis_ulangan', `durasi_ulangan` = '$durasi_ulangan',`id_bab` = '$id_bab' WHERE `id_ulangan` = '$id_ulangan'");
	if($query->execute()){
		echo 1;
	}
?>