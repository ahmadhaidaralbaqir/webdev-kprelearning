<?php 
if(!isset($_SESSION["ulangan"]) == true){
	header('location: index.php');
} 
?>
<div class="box-exam-left">
	<div class="box-question">
		<div class="list-question">
			<?php 
				$id_ulangan = $_SESSION["id_ulangan"];
				$query = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_ulangan` = '$id_ulangan'");
				$query->execute();
				while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
					<div class="question">
						<div class=""></div>	
					</div>
			<?php	}
			 ?>
		</div>
	</div>
</div>
<div class="box-exam-right"></div>