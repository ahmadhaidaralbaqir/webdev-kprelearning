<div class="welcome-notification">
			<p class="title">Hi, <b ><?= $nama_siswa; ?></b> ! Selamat datang kembali.</p>
			<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt. <a href="" style="text-decoration: underline; color:whitesmoke; ">View users .</a></p>
			<br>
			<br>
			<a href="?module=setting" class="btn-action">Change password</a>
			<a href="logout.php" class="btn-action">Logout</a>
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
		                                        $jumlahMateri =+ $data2["jumlahMateri"];
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
							10
							</a>
					</div>
					<div class="desc">
						<ul>
							<li><a href="">Question</a></li>
						</ul>
						<br>
						<a href="?module=question" class="btn-view"> View Question</a>
					</div>
				</div>

				<div class="box-widget">
					<div class="icon">
							<img src="assets/img/aktifitas.png">
							<a href="" class="amount">
								20
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
									$query = $koneksiDb->prepare("SELECT `bab`.*, `ulangan`.*
										FROM `bab`
										    INNER JOIN `ulangan` ON `ulangan`.`id_bab` = `bab`.`id_bab` WHERE `bab`.`kode_kelas` = '$kode_kelas' AND  `ulangan`.`status_ulangan` = '1'
										");
									$no =1;
									$query->execute();
									while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= $data["nama"]; ?></td>
											<td><?= $data["status_ulangan"]; ?></td>
											<td>
												<?php 
													if(isset($_SESSION["ulangan"])){ ?>
														<a href="?module=ulangan">Lanjutkan Ulangan</a>
													<?php }else{ ?>
														<a href="javascript:void(0)" onclick="return ikutUlangan('<?= $data["id_ulangan"];  ?>');">Ikut Ulangan</a></td>
												<?php }
												 ?>
												
										</tr>
								<?php $no++; }
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
