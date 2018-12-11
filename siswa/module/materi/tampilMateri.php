<div class="notification">
	<p>Silahkan pilih materi yang akan anda pelajari .</p>
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
					<td>Nama materi</td>
					<td>Jumlah siswa belajar</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
					$id_bab = $_GET["rzkwn"];
					$query = $koneksiDb->prepare("SELECT * FROM `materi` WHERE `id_bab` = '$id_bab'");
					$query->execute();
					$no = 1;
					if($query->rowCount() >= 1){
						while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $data["nama_materi"]; ?></td>
								<td>
									<?php 
										$nama_aktifitas = "Mengerjakan materi ".$data["nama_materi"];
										$cekAktifas = $koneksiDb->prepare("SELECT COUNT(*) AS jumlahSiswaBelajar FROM `aktifitas` WHERE `nama_aktifitas` = '$nama_aktifitas'");
										$cekAktifas->execute();
										$aktifitas = $cekAktifas->fetch(PDO::FETCH_LAZY);
										echo $aktifitas["jumlahSiswaBelajar"];

									?>
								</td>
								<td><a href="?module=detailmateri&rzkwn=<?= $data["kode_materi"]; ?>">Belajar sekarang</a></td>
							</tr>
						<?php	}
					}else{
						echo "<tr>
							<td colspan='4'>Tidak ada materi pada bab ini.</td>
						</tr>";
					}
					
				?>
			</tbody>
		</table>
		<div class="box-footer"></div>
	</div>