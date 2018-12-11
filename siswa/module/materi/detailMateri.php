<?php

	$kode_materi = $_GET["rzkwn"];
	$query = $koneksiDb->prepare("SELECT * FROM `materi` WHERE `kode_materi` = '$kode_materi'");
	$query->execute();
	while($data = $query->fetch(PDO::FETCH_LAZY)){
		$judul_materi = $data["nama_materi"];
		$isi_materi   = $data["isi_materi"];
	}

	//tambahkan aktifitas 
	$nama_aktifitas = "Mengerjakan materi ".$judul_materi;
	$cekAktifas = $koneksiDb->prepare("SELECT nama_aktifitas FROM `aktifitas` WHERE `nama_aktifitas` = '$nama_aktifitas' AND `nisn` = '$nisn'");
	$cekAktifas->execute();
	if($cekAktifas->rowCount() >= 1){
		
	}else{
		$tambahkanAktifitas = $koneksiDb->prepare("INSERT INTO `aktifitas` SET `nama_aktifitas` = '$nama_aktifitas', `nisn` = '$nisn', `waktu` = CURRENT_TIMESTAMP");
		$tambahkanAktifitas->execute();
	}
 ?>
<div class="detailmateri">
	<p class="title"><?= $judul_materi; ?></p>
	<a href="" class="aksi-materi">Materi Sebelumnya</a>
	<a href="" class="aksi-materi" style="margin-left: 0px;">Materi Selanjutnya</a>
	<br>
	<br>
	<br>
	<div class="isi-materi">      
		<p><?= $isi_materi; ?></p>
	</div>
</div>