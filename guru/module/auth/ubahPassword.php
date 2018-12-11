<?php
	require_once '../../../config/koneksi.php';
	$id_user = $_POST["id_user"];
	$password_lama = $_POST["password_lama"];
	$konfirmasi_password_lama = md5($_POST["konfirmasi_password_lama"]);
	$password_baru = md5($_POST["password_baru"]);

	if($konfirmasi_password_lama != $password_lama ){
		echo "<script>alert('konfirmasi password tidak sama'); window.history.back()</script>";
	}else{	
		$query = $koneksiDb->prepare("UPDATE `user` SET `password` = '$password_baru' WHERE `id_user` = '$id_user'");
		if($query->execute()){
			echo "<script>alert('password berhasil di ubah'); window.history.back()</script>";
		}else{
			echo "<script>alert('password gagal di ubah'); window.history.back()</script>";
		}
	}
 ?>