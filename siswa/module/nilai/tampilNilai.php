<div class="notification">
	<p>Berikut data nilai ulangan anda.</p>
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
					<td>Nama ulangan</td>
					<td>Tanggal ulangan</td>
					<td>Nilai</td>
					<td>Grade</td>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php
					$query = $koneksiDb->prepare("SELECT `nilai`.`id_nilai`, `siswa`.`nama_siswa`,`nilai`.`nilai`,`bab`.`nama`,`ulangan`.`tgl_ulangan` FROM `siswa` 
						INNER JOIN `nilai` ON `nilai`.`nisn` = `siswa`.`nisn`
						JOIN `ulangan` ON `nilai`.`id_ulangan` = `ulangan`.`id_ulangan`
                        JOIN `bab` ON `ulangan`.`id_bab` = `bab`.`id_bab`
                        WHERE `nilai`.`nisn` = '$nisn'");
					$no=1;
					$query->execute();
					while($data= $query->fetch(PDO::FETCH_LAZY)){ ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $data["nama"]; ?></td>
							<td>
								<?php
									$waktu_ulangan  = explode("-", $data["tgl_ulangan"]);
									switch ($waktu_ulangan[1]) {
										case '1':
												$bulan = "Januari";
											break;
										case '2':
												$bulan = "Februari";
											break;
										case '3':
												$bulan = "Maret";
											break;
										case '4':
												$bulan = "April";
											break;
										case '5':
												$bulan = "Mei";
											break;
										case '6':
												$bulan = "Juni";
											break;
										case '7':
												$bulan = "Juli";
											break;
										case '8':
												$bulan = "Agustus";
											break;
										case '9':
												$bulan = "September";
											break;
										case '10':
												$bulan = "Oktober";
											break;
										case '11':
												$bulan = "November";
											break;
										case '12':
												$bulan = "Desember";
											break;										
										default:
											# code...
											break;
									}
									echo $waktu_ulangan[2]." ".$bulan." ".$waktu_ulangan[0];
								 ?>
							</td>
							<td><?= $data["nilai"];  ?></td>
							<td>A</td>
						</tr>
					<?php $no++; }
				 ?>
			</tbody>
		</table>
		<div class="box-footer"></div>
	</div>