<div class="notification">
	<p>Untuk memulai aktifitas belajar silahkan pilih bab yang berkaitakan dengan materi yang akan anda pelajari.</p>
</div>
<div class="box-table">
		<div class="box-header">
			<div class="search">
				<input type="text" id="myInput" onkeyup="liveSearch()">
				<i class="fa fa-search"></i>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<td>No</td>
					<td>Nama bab</td>
					<td>Jumlah materi</td>
					<td>Status</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
					$query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `kode_kelas` = '$kode_kelas'");
					$query->execute();
					$no = 1;
					while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $data["nama"]; ?></td>
					<td>
						<?php $jumlahMateri = $koneksiDb->prepare("SELECT COUNT(*) AS jumlahMateri FROM materi WHERE id_bab = '$data[id_bab]'");
							  $jumlahMateri->execute();
							  $dataJumlahMateri = $jumlahMateri->fetch(PDO::FETCH_LAZY);
							  echo $dataJumlahMateri["jumlahMateri"];
						 ?>	
					</td>
					<td>2 Akfitas belum tuntas</td>
					<td><a href="?module=materi&rzkwn=<?= $data["id_bab"]; ?>">Pilih bab</a></td>
				</tr>
				<?php	}
				?>
			</tbody>
		</table>
		<div class="box-footer"></div>
	</div>