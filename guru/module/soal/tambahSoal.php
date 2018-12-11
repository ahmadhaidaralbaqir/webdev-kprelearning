<?php 
	require_once '../../../config/koneksi.php';
	$id_ulangan = $_POST["id_ulangan"];
	$isi_soal = $_POST["pertanyaan"];
	$pilihan_a = $_POST["pilihan_a"];
	$pilihan_b = $_POST["pilihan_b"];
	$pilihan_c = $_POST["pilihan_c"];
	$pilihan_d = $_POST["pilihan_d"];
	$pilihan_d = $_POST["pilihan_d"];
	$jawaban   = $_POST["kunci_jawaban"];
	$query = $koneksiDb->prepare("INSERT INTO `soal` SET `id_soal` = NULL, `isi_soal` = '$isi_soal' , `pilihan_a` = '$pilihan_a' , `pilihan_b` = '$pilihan_b', `pilihan_c` = '$pilihan_c', `pilihan_d` = '$pilihan_d', `jawaban` = '$jawaban' , `gambar_soal` = '', `id_ulangan` = '$id_ulangan'");
	if($query->execute()){
		echo 1;
	}
?>