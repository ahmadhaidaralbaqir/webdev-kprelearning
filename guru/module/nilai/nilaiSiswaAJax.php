<?php
    require_once '../../../config/koneksi.php';	
    $nisn = $_POST["nisn"];
	$query = $koneksiDb->prepare("SELECT `ulangan`.`id_ulangan`, `bab`.`nama`, `siswa`.`nama_siswa`, `nilai`.`nilai` FROM `siswa` LEFT JOIN `nilai` ON `nilai`.`nisn` = `siswa`.`nisn` LEFT JOIN `ulangan` ON `nilai`.`id_ulangan` = `ulangan`.`id_ulangan` LEFT JOIN `bab` ON `ulangan`.`id_bab` = `bab`.`id_bab` WHERE `nilai`.`nisn` = '$nisn' ");
    $query->execute();
    $no = 1;
    if($query->rowCount() <= 0){
    	echo "<tr><td colspan='4'>Tidak ada data nilai.</td>/tr>";
    }else{
    	  while($data = $query->fetch(PDO::FETCH_LAZY)){ 
    	?>
	<tr>
		<td><?= $no; ?></td>
		<td><?= $data["nama"]; ?></td>	
		 <td><?php if($data["nilai"] <= 0) echo "0"; else echo $data["nilai"]; ?></td>
		<td>
			<?php 
				if($data["nilai"] >= 90){
					echo "A";
				}elseif($data["nilai"] >= 80){
					echo "B";
				}elseif($data["nilai"] >= 70){
					echo "C";
				}else{
					echo "D";
				}
			 ?>
		</td>

	</tr>
 <?php  $no++;  }
    }
  
 ?>
