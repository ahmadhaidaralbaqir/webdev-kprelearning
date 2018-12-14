<?php 
if(!isset($_SESSION["ulangan"]) == true){
	header('location: index.php');
} 
?>
<div class="box-exam-left">
	<div class="box-question">
		<form method="POST" action="index.php?module=hasil">
		<div class="list-question" id="board-question">
			<?php 
				$id_ulangan = $_SESSION["id_ulangan"];
				$query = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_ulangan` = '$id_ulangan'");
				$query->execute();
				$no_soal = 1;
				while($data = $query->fetch(PDO::FETCH_ASSOC)){ ?>
						<div class="question">
							<div class="question-title">
								<p>
									<?= $no_soal.". ".ucfirst($data["isi_soal"]); ?>
								</p>
							</div>	
							<div class="question-choice">
								<ul>
									<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="a" id="question-number-<?= $no_soal; ?>-choice-a"> <label for="question-number-<?= $no_soal; ?>-choice-a"><?= $data["pilihan_a"] ?></label></li>
									<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="b" id="question-number-<?= $no_soal; ?>-choice-b"> <label for="question-number-<?= $no_soal; ?>-choice-b"><?= $data["pilihan_b"] ?></label></li>
									<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="c" id="question-number-<?= $no_soal; ?>-choice-c"> <label for="question-number-<?= $no_soal; ?>-choice-c"><?= $data["pilihan_c"] ?></label></li>
									<li><input type="radio" name="answer_question[<?php echo "$data[id_soal]"; ?>]" value="d" id="question-number-<?= $no_soal; ?>-choice-d"> <label for="question-number-<?= $no_soal; ?>-choice-d"><?= $data["pilihan_d"] ?></label></li>
								</ul>
							</div>
						</div>
				<?php $no_soal++; }
			 ?>
			<input type="submit" name="submitAnswer" value="Submit jawaban" class="btn-submit-answer">
		</div>
	</form>

	</div>
</div>

<div class="box-exam-right">
	<div class="timer">
		<p id="timer"></p>
	</div>
</div>
