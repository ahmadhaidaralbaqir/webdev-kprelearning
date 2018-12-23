<?php
	require_once '../../../config/koneksi.php';
	$kode_kelas = $_POST["kode_kelas"];
	$nip = $_POST["nip"];
	$query = $koneksiDb->prepare("SELECT `bab`.*, `ulangan`.* FROM `bab` INNER JOIN `ulangan` ON `ulangan`.`id_bab` = `bab`.`id_bab` WHERE `bab`.`kode_kelas` = '$kode_kelas'
    AND `bab`.`nip` = '$nip'");
	$query->execute();
	echo "<option selected='' disabled=''>[ Pilih Ulangan ]</option>";
	while($data = $query->fetch(PDO::FETCH_LAZY)){
			echo "<option value='".$data['id_ulangan']."'>".$data['nama']."</option>";
	}
 ?>