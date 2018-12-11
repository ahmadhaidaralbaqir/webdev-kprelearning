<?php
	require_once '../../../config/koneksi.php';
	
	$id_soal = $_POST["id_soal"];
	
	$query = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_soal` = '$id_soal'");
	$query->execute();
	$data = $query->fetch(PDO::FETCH_LAZY);
    echo json_encode($data);
	
 ?>