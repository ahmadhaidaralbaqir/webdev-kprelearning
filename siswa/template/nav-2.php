<div class="nav-2">
    <ul class="breadcumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard /</a></li>
        <li><a href="index.php?module=<?= $_GET['module']; ?>"  class="breadcumb-is-active"><?= ucfirst($_GET["module"]); ?></a></li>
    </ul>    
    <?php 
            if($_GET["module"] != "belajar" && $_GET["module"] != "ulangan"){ ?>
                <a href="javascript:void(0)" onclick="kembali()" class="btn-add-new">Kembali</a>
            <?php  
              }elseif($_GET["module"] == "ulangan"){ ?>
                <a href="javascript:void(0)" onclick="submitJawaban()" class="btn-add-new">Submit Ulangan</a>
            <?php  
              }else{

              }
            ?>
</div>