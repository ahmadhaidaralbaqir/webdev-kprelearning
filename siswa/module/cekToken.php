<?php
	require_once '../../config/koneksi.php';
	$id_ulangan = $_POST["id_ulangan"];
	$kode_token =  $_POST["kode_token"];

	$query = $koneksiDb->prepare("SELECT * FROM `ulangan` WHERE `id_ulangan` = '$id_ulangan'");
	$query->execute();
	while($data = $query->fetch(PDO::FETCH_LAZY)){
		if($kode_token == $data["kode_token"]){
			echo 1;
			session_start();
			$_SESSION["ulangan"] = true;
			$_SESSION["id_ulangan"] = $id_ulangan;
			$_SESSION["durasi"] = $data["durasi_ulangan"];
		}else{
			echo 0;
		}
	}
 ?>