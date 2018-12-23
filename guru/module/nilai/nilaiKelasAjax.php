<?php
    require_once '../../../config/koneksi.php';	
    $id_ulangan = $_POST["id_ulangan"];
    $kode_kelas = $_POST["kode_kelas"];
	$query = $koneksiDb->prepare("SELECT * FROM `siswa` WHERE `kode_kelas` = '$kode_kelas' ORDER BY `nisn` DESC");
    $query->execute();
    $no = 1;
    while($data = $query->fetch(PDO::FETCH_LAZY)){ 
    		$query2 = $koneksiDb->prepare("SELECT * FROM `nilai` WHERE `nisn` = '$data[nisn]' AND `id_ulangan` = '$id_ulangan'");
    		$query2->execute();
    		$data2 = $query2->fetch(PDO::FETCH_LAZY);
    	?>
	<tr>
		<td><?= $no; ?></td>
		<td><?= $data["nisn"]; ?></td>
		<td><?= $data["nama_siswa"]; ?></td>	
		 <td><?php if($data2["nilai"] <= 0) echo "0"; else echo $data2["nilai"]; ?></td>
		<td>
			<?php 
				if($data2["nilai"] >= 90){
					echo "A";
				}elseif($data2["nilai"] >= 80){
					echo "B";
				}elseif($data2["nilai"] >= 70){
					echo "C";
				}else{
					echo "D";
				}
			 ?>
		</td>
		<td><?php 	if($data2["nilai"] <= 60) echo "Remedial"; else echo "Lulus"; ?></td>

	</tr>
 <?php  $no++;  }
 ?>
