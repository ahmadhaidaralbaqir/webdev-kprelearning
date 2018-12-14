	<?php 
if(isset($_POST["submitAnswer"])){
		$answer =  $_POST["answer_question"];
		$correct = 0;
		$intcorrect = 0;
		if(count($_POST["answer_question"]) == 0){
			echo "tidak ada jawabn yang di submit";
		}else{
			foreach ($answer as $id_soal => $answer_value) {
				$checkAnswer = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_soal` = '$id_soal'");
				$checkAnswer->execute();
				while($data = $checkAnswer->fetch(PDO::FETCH_LAZY)){
					if(strtoupper($answer_value) == $data["jawaban"]){
						$correct = $correct + 1;
					}else{
						$intcorrect = $intcorrect + 1;
					}
				}

			}
		
		$checkTotalQuestion = $koneksiDb->prepare("SELECT COUNT(*) as `totalQuestion` FROM `soal` WHERE `id_ulangan` = '$_SESSION[id_ulangan]'");
		$checkTotalQuestion->execute();
		$dataTotal = $checkTotalQuestion->fetch(PDO::FETCH_LAZY);
		$value = $correct  / $dataTotal["totalQuestion"] * 100;
		$query = $koneksiDb->prepare("INSERT INTO `nilai` SET `nilai` = '$value', `id_ulangan` = '$_SESSION[id_ulangan]', `nisn` = '$nisn'");
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
 		<p><?= $value; ?></p>
 	</div>
 	<div class="text">
 		<p class="title"><b>Selamat,</b> Anda telah mengerjakan ulangan Teks anekdot</p>
 		<p class="subtitle"><?= $correct; ?> soal di jawab benar <?= $intcorrect; ?> soal di jawab salah</p>
 		<a href="">Kembali ke halaman utama</a>
 		<a href="" class="btn-bordered">Lihat peringkat</a>
 	</div>
 </div>