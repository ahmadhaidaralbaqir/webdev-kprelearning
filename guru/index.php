<?php
    session_start();
    // error_reporting(0);
    if(empty($_SESSION['login'])){
        echo '<script>window.location="../login.php"</script>';
    }
    require_once '../config/koneksi.php';
    $query = $koneksiDb->prepare("SELECT * FROM `guru` WHERE `id_user` = '$_SESSION[id_user]'");
    $query->execute();
    while($data = $query->fetch(PDO::FETCH_LAZY)){
        $_SESSION["nip"] = $data["nip"];
        $nama_guru = $data["nama_guru"];
        $query2 = $koneksiDb->prepare("SELECT * FROM `ajar` WHERE `nip` = '$data[nip]'");
        $query2->execute();
        $data2 = $query2->fetch(PDO::FETCH_LAZY);
        $_SESSION["id_ajar"] = $data2["id_ajar"];
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eLearning - Dashboard Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="assets/lib/sweet alert/sweetalert.css">

</head>

<body class="body-bg">
    <input type="hidden" id="nip" value="<?= $_SESSION["nip"]; ?>">
    <input type="hidden"  id="idAjar" value="<?= $_SESSION["id_ajar"]; ?>">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/icon/logo2.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-3 clearfix text-right">

                        <div class="clearfix d-md-inline-block d-block ">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> Hi, <?= $nama_guru; ?><i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".modal-edit-password">Ubah Password</a>
                                    <a class="dropdown-item" href="logout.php">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="index.php"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:void(0)"><i class="ti-layout-sidebar-left"></i><span>Data Master</span></a>
                                        <ul class="submenu">
                                            <li><a href="?mod=bab">Bab</a></li>
                                            <li><a href="?mod=materi">Materi</a></li>
                                            <li><a href="?mod=ulangan">Ulangan</a></li>
                                            <li><a href="?mod=soal">Soal</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Raport</span></a>
                                        <ul class="submenu">
                                            <li><a href="barchart.html">Kelas</a></li>
                                            <li><a href="linechart.html">Siswa</a></li>
                                        </ul>
                                    </li>
                                   <li>
                                       <a href=""><i class="ti-book"></i>Laporan</a>
                                   </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <div class="col-lg-6 clearfix">
                      <div class="d-md-inline-block d-block mr-md-4 pull-right">
                            <ul class="notification-area">

                           
                                <li class="settings-btn">
                                    <i class="ti-settings"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="container">
                
                <?php
                    // error_reporting(0);
                    $mod = $_GET["mod"];
                    require_once 'modal.php';
                    if($mod == "bab") require_once 'module/bab/tampilBab.php';
                    elseif($mod =="materi") require_once 'module/materi/tampilMateri.php';
                    elseif($mod =="ulangan") require_once 'module/ulangan/tampilUlangan.php';
                    elseif($mod =="soal") require_once 'module/soal/soal.php';
                    else require_once 'default.php';
                ?>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <!--  <footer>
            <div class="col-12 footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer> -->
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class=" offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Aktifitas Siswa</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <?php
                            $query = $koneksiDb->prepare("SELECT `ajar`.`nip`, `siswa`.`nama_siswa`, `aktifitas`.`nama_aktifitas`, `aktifitas`.`waktu` FROM `ajar`, `siswa` INNER JOIN `aktifitas` ON `aktifitas`.`nisn` = `siswa`.`nisn` WHERE `ajar`.`nip` = '$_SESSION[nip]'");
                            $query->execute();
                            while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
                                    <div class="timeline-task">
                                        <div class="icon bg1">
                                                <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Ahmad haidar</h4>
                                            <span class="time"><i class="ti-time"></i>
                            <?php   
                                date_default_timezone_set("Asia/Jakarta");
                                $time_ago = strtotime($data["waktu"]);
                                $current_time = time();
                                $time_difference = $current_time - $time_ago;
                                $seconds  = $time_difference;
                                                        
                                $minutes = round($seconds / 60); // value 60 is seconds  
                                $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
                                $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
                                $weeks   = round($seconds / 604800); // 7*24*60*60;  
                                $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
                                $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                    
                                  if ($seconds <= 60){

                                      echo "Just Now";

                                  }elseif ($minutes <= 60){

                                    if ($minutes == 1){

                                            echo "one minute ago";
                                    }else{

                                    echo "$minutes minutes ago";
                                    }

                                  }elseif ($hours <= 24){

                                      if ($hours == 1){
                                          echo "an hour ago";
                                      } else {
                                          echo "$hours hours ago";
                                      }

                                  }elseif($days <= 7){

                                    if ($days == 1){
                                          echo "yesterday";
                                  }else{
                                    echo "$days days ago";
                                  }
                                }
                                                     ?>
                                            </span>
                                        </div>
                                        <p><?= $data["nama_aktifitas"]; ?></p>
                                    </div>
                           <?php }
                     ?>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/lib/DataTables/datatables.min.js"></script>


    <script src="assets/lib/sweet alert/sweetalert.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/ajax.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dataTable").DataTable();
        });
    </script>
</body>

</html>
