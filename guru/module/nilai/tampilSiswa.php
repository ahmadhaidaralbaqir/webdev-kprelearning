	<?php
		require_once '../../../config/koneksi.php';
		$kode_kelas = $_POST["kode_kelas"];
		$query = $koneksiDb->prepare("SELECT nisn,nama_siswa FROM siswa WHERE kode_kelas = '$kode_kelas'");
		$query->execute();
		echo "<option selected disabled>[ Pilih Siswa ]</option>";
		while($data = $query->fetch(PDO::FETCH_LAZY)){
			echo "<option value='$data[nisn]'>$data[nisn] - $data[nama_siswa]</option>";
		}
	?>