
<?php
  require_once 'template/header.php';
 ?>

 <div class="col-md-12 container">
  <?php
    $module = $_GET["module"];
    if($module ==="belajar"){
      require_once "module/bab/tampilBab.php";
    }elseif($module ==="materi"){
      require_once "module/materi/tampilMateri.php";
    }elseif($module ==="detailmateri"){
      require_once "module/materi/detailmateri.php";
    }elseif($module ==="ulangan"){
      require_once 'ulangan.php';
    }else{  
      require_once "default.php";
    }
  ?>
 </div>
 <?php require_once 'template/footer.php'; ?>
