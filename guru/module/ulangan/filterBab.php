<?php
	require_once '../../../config/koneksi.php';
	$kode_kelas = $_POST["kode_kelas"];
	$nip = $_POST["nip"];
	$query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `kode_kelas` = '$kode_kelas' AND `nip` = '$nip'");
	$query->execute();
	echo "<option selected='' disabled=''>[ Pilih Bab ]</option>";
	while($data = $query->fetch(PDO::FETCH_LAZY)){
		echo "<option value='".$data['id_bab']."'>".$data['nama']."</option>";
	}