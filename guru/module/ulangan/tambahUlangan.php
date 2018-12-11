<?php
	require_once '../../../config/koneksi.php';
	$kode_token = $_POST["kode_token"];
	$nip = $_POST["nip"];
	$id_bab = $_POST["id_bab"];
	$jenis_ulangan = $_POST["jenis_ulangan"];
	$tgl_ulangan = $_POST["tgl_ulangan"];
	$jenis_ulangan = $_POST["jenis_ulangan"];
	$durasi_ulangan = $_POST["durasi_ulangan"];
	$query = $koneksiDb->prepare("INSERT INTO `ulangan` SET `id_ulangan`= NULL, `kode_token`='$kode_token',`tgl_ulangan` =' $tgl_ulangan', `jenis_ulangan` = '$jenis_ulangan', `durasi_ulangan` = '$durasi_ulangan', `status_ulangan` = '0',`id_bab` = '$id_bab', `nip` = '$nip'");
	if($query->execute()){
		echo 1;
	}else{
		echo  0;
	}
 ?>
