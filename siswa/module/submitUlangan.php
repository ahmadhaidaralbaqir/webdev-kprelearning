	<?php 
if(isset($_POST["submitAnswer"])){
		//proses menambahkan akfitas baru 
		$id_bab = $_SESSION["id_bab"];
		//mengambil nama bab 
		$ambilNamaBab = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `id_bab` = '$id_bab'");
		$ambilNamaBab->execute();
		$namaBab =  $ambilNamaBab->fetch(PDO::FETCH_LAZY);
		//membuat nama aktifitas
		$nama_aktifitas = "Mengerjakan ulangan ".$namaBab["nama"];
		//mengecek apakah aktifitas ada atau tidak
		$cekAktifas = $koneksiDb->prepare("SELECT nama_aktifitas FROM `aktifitas` WHERE `nama_aktifitas` = '$nama_aktifitas' AND `nisn` = '$nisn'");
		$cekAktifas->execute();
		//jika aktifitas telah di kerjakan maka tidak akan menjalankan aksi tambahkan aktifitas 
		if($cekAktifas->rowCount() >= 1){
			
		}else{

		//jika aktifitas belum di kerjakan maka  akan menjalankan aksi tambahkan 
		$tambahkanAktifitas = $koneksiDb->prepare("INSERT INTO `aktifitas` SET `nama_aktifitas` = '$nama_aktifitas', `nisn` = '$nisn', `waktu` = CURRENT_TIMESTAMP");
		$tambahkanAktifitas->execute();
		}



		// proses pengecekan jawaban	
		$jawaban =  $_POST["answer_question"];
		$benar = 0;
		$salah = 0;
		// jika tidak ada soal yang di kerjakan maka tidak akan di jalankan proses pengecekan soal
		if(count($_POST["answer_question"]) == 0){
			echo "tidak ada jawaban yang di submit";
		}else{
		// jika  ada soal yang di kerjakan maka  akan di jalankan proses pengecekan soal
			foreach ($jawaban as $id_soal => $isi_jawaban) {
				$cekJawaban = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_soal` = '$id_soal'");
				$cekJawaban->execute();
				while($data = $cekJawaban->fetch(PDO::FETCH_LAZY)){
					if(strtoupper($isi_jawaban) == $data["jawaban"]){
						//jika jawaban benar maka akan variabel $benar akan di tambah 1 
						$benar = $benar + 1;
					}else{
						//jika jawaban salah maka akan variabel $salah akan di tambah 1
						$salah = $salah + 1;
					}

			}
		}
		// query untuk menghitung nilai 
			$cekJumlahSoal = $koneksiDb->prepare("SELECT COUNT(*) as `totalQuestion` FROM `soal` WHERE `id_ulangan` = '$_SESSION[id_ulangan]'");
			$cekJumlahSoal->execute();
			$dataTotal = $cekJumlahSoal->fetch(PDO::FETCH_LAZY);
			//rumus menghitung nilai = jumlah jawaban benar / jumlah soal * 100
			$nilai	 = $benar  / $dataTotal["totalQuestion"] * 100;
			$query = $koneksiDb->prepare("INSERT INTO `nilai` SET `nilai` = '$nilai', `id_ulangan` = '$_SESSION[id_ulangan]', `nisn` = '$nisn'");
			if($query->execute()){
				unset($_SESSION["ulangan"]);
				unset($_SESSION["id_ulangan"]);
				unset($_SESSION["durasi"]);
			}
	}
}
 ?>	

 <div class="examination-result">
 	<div class="score">
 		<p><?= $nilai; ?></p>
 	</div>
 	<div class="text">
 		<p class="title"><b>Selamat,</b> Anda telah mengerjakan ulangan Teks anekdot</p>
 		<p class="subtitle"><?= $benar; ?> soal di jawab benar <?= $salah; ?> soal di jawab salah</p>
 		<a href="">Kembali ke halaman utama</a>
 		<a href="" class="btn-bordered">Lihat peringkat</a>
 	</div>
 </div>