<div class="welcome-notification">
	<br>
	<br>
			<p class="title">Hi, <b ><?= $nama_siswa; ?></b> ! Selamat datang kembali.</p>
			<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt. </p>
			<!-- <br> -->
			<!-- <br> -->
		<!-- 	<a href="?module=setting" class="btn-action">Change password</a>
			<a href="logout.php" class="btn-action">Logout</a> -->
			<br>

</div>
		<div class="widget-overview">
			<div  class="body-box-widget" style="margin-left: 80px;">
				<div class="box-widget">
					<div class="icon">
							<img src="assets/img/course.png">
							<a href="" class="amount">
								<?php
	                               $query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `kode_kelas` = '$kode_kelas'");
	                                $query->execute();
	                                while($data = $query->fetch(PDO::FETCH_LAZY)){
	                                    $query2 = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahMateri` FROM  `materi` WHERE `id_bab`= '$data[id_bab]'");
	                                    $query2->execute();
		                                     while($data2= $query2->fetch(PDO::FETCH_LAZY)){
		                                        $jumlahMateri + $data2["jumlahMateri"];
		                                        $jumlahMateri ++;
		                                     }

	                                }
	                                echo $jumlahMateri;

	                             ?>
							</a>
					</div>
					<div class="desc">
						<ul>
							<li><a href="">Materi</a></li>
						</ul>
						<br>
						<a href="?module=belajar" class="btn-view">Belajar Sekarang</a>
					</div>
				</div>



				<div class="box-widget">
					<div class="icon">
							<img src="assets/img/icon_mater.png">
							<a href="" class="amount">
							<?php
								$jumlahBab = $koneksiDb->prepare("SELECT COUNT(*) AS jumlahBab FROM `bab` WHERE `kode_kelas` = '$kode_kelas'");
								$jumlahBab->execute();
								$datajumlahBab = $jumlahBab->fetch(PDO::FETCH_LAZY);
								echo $datajumlahBab["jumlahBab"];
								 ?>
							</a>
					</div>
					<div class="desc">
						<ul>
							<li><a href="">Bab</a></li>
						</ul>
						<br>
						<a href="?module=question" class="btn-view">Lihat bab</a>
					</div>
				</div>

				<div class="box-widget">
					<div class="icon">
							<img src="assets/img/aktifitas.png">
							<a href="" class="amount">
								<?php 
									$jumlahAktifitas = $koneksiDb->prepare("SELECT COUNT(*) AS jumlahAktifitas FROM `aktifitas` WHERE `nisn` = '$nisn'");
									$jumlahAktifitas->execute();
									$datajumlahAktifitas = $jumlahAktifitas->fetch(PDO::FETCH_LAZY);
									echo $datajumlahAktifitas["jumlahAktifitas"];
								 ?>
							</a>
					</div>
					<div class="desc">
						<ul>
							<li><a href="">Aktifitas</a></li>
						</ul>
						<br>
						<a href="?module=categories" class="btn-view"> Lihat Aktifitas</a>
					</div>
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>
	<div class="widget-user">
		<div class="user-suggestion">
				<p style="margin-left: 120px; margin-top: 20px; margin-bottom: 20px;">Ulangan Saat ini</p>

			<div class="user-box-suggestion">
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
										<td>Status</td>
										<td>Aksi</td>
								</tr>
						</thead>
						<tbody  id="myTable">	
								<?php
					
										$query2 = $koneksiDb->prepare("SELECT `bab`.*, `ulangan`.*
										FROM `bab`
										    INNER JOIN `ulangan` ON `ulangan`.`id_bab` = `bab`.`id_bab` WHERE `bab`.`kode_kelas` = '$kode_kelas' AND  `ulangan`.`status_ulangan` = '1'
										");
										$no =1;
										$query2->execute();
										
										while($data2 = $query2->fetch(PDO::FETCH_LAZY)){ 

											//mengecek apakah siswa telah mengerjakan ulangan atau belum 
											//jika siswa belum mengerjakan ulangan maka daftar ulangan tidak akan di tampilkan lagi
											$nama_aktifitas = "Mengerjakan ulangan".$data2["nama"];
											$cek = $koneksiDb->prepare("SELECT * FROM aktifitas WHERE nama_aktifitas = '$nama_aktifitas' AND nisn = '$nisn'");
											$cek->execute();
											if($cek->rowCount() >= 1){ ?>
											echo "ada";

											<?php }else{ 
																
												echo "tidak ada";
										 }

										 }
									
								 ?>
						</tbody>
				</table>
				<div class="box-footer"></div>
			</div>
		</div>
		<div class="user-online">
			<p class="caption" >Online User</p>
			<div class="box-user-online">
				<div class="box-header"></div>
					
			</div>	
		</div>
	</div>
