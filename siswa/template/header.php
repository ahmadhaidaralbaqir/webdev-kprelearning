<?php
    session_start();
    // error_reporting(0);
    if(empty($_SESSION['login'])){
        echo '<script>window.location="../login.php"</script>';
    }
    require_once '../config/koneksi.php';
    $query = $koneksiDb->prepare("SELECT * FROM `siswa` WHERE `id_user` = '$_SESSION[id_user]'");
    $query->execute();
    while($data = $query->fetch(PDO::FETCH_LAZY)){
    	$nisn = $data["nisn"];
        $nama_siswa = $data["nama_siswa"];
        $kode_kelas = $data["kode_kelas"];
    }
?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eLearning - Siswa</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/sweet alert/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<header>
		<a href="index.php" class="logo"><img src="assets/img/8957b93016657796b4e5fa9f02771de1.png"></a>
		<ul id="menuDropdown">
			<li><a href="index.php"><i class="fa fa-home"></i>Beranda</a></li>
			<li><a href="?module=belajar"><i class="fa fa-pencil"></i> Belajar</a></li>
			<li><a href="?module=datanilai"><i class="fa fa-calendar-check-o"></i></i> Nilai</a></li>
			<li><a href="?module=peringkat"><i class="fa fa-trophy"></i> Peringkat</a></li>
		</ul>
		<div class="nav-toggle" onclick="dropdown(this)">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</header>
<?php
		if(empty($_GET["module"])){
			require_once "waves-landing.php";
		}else{

			if($_GET["module"] != "detailmateri"){
				require_once "nav-2.php";
			}else{
				require_once "waves-landing.php";
			}
		}
?>