<?php 
if(!isset($_SESSION["ulangan"]) == true){
	header('location: index.php');
} 
?>
<div class="box-exam-left">
	<div class="box-question">
		<form method="POST" action="index.php?module=ulangan">
		<div class="list-question">
			<?php 
				$id_ulangan = $_SESSION["id_ulangan"];
				$query = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_ulangan` = '$id_ulangan'");
				$query->execute();
				$no_soal = 1;
				while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
					<div class="question">
						<div class="question-title">
							<?= $no_soal.". ".ucfirst($data["isi_soal"]); ?>
						</div>	
						<div class="question-choice">
							<ul>
								<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="a"> <?= $data["pilihan_a"]; ?></li>
								<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="b"> <?= $data["pilihan_b"]; ?></li>
								<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="c"> <?= $data["pilihan_c"]; ?></li>
								<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="d"> <?= $data["pilihan_d"]; ?></li>
							</ul>
						</div>
					</div>
			<?php $no_soal++;	}
			 ?>
		<input type="submit" name="submitJawaban" value="Submit Jawaban">
		</div>
	</form>
		<?php 
			if(isset($_POST["submitJawaban"])){
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
				echo "BENAR " . $correct;
				echo "SALAH ".$intcorrect;
				$checkTotalQuestion = $koneksiDb->prepare("SELECT COUNT(*) as `totalQuestion` FROM `soal` WHERE `id_ulangan` = '$_SESSION[id_ulangan]'");
				$checkTotalQuestion->execute();
				$dataTotal = $checkTotalQuestion->fetch(PDO::FETCH_LAZY));
					echo $dataTotal["totalQuestion"];
				}
			}
		 ?>
	</div>
</div>

<div class="box-exam-right"></div>