<?php 
	require_once '../../../config/koneksi.php';
	$id_bab = $_POST["id_bab"];
	$kode_materi = $_POST["kode_materi"];
	$nama_materi = addslashes(trim(htmlentities($_POST["nama_materi"])));
	$isi_materi = addslashes(trim(htmlentities($_POST["isi_materi"])));
	$query = $koneksiDb->prepare("UPDATE `materi` SET `nama_materi` = '$nama_materi', `isi_materi` = '$isi_materi', `id_bab` = '$id_bab' WHERE `kode_materi` = '$kode_materi'");
	if($query->execute()){
		echo 1;
	}
?>