<div class="col-12 mt-5">
    <?php if(isset($_GET["notif"])) require_once 'alert.php';?>
    <?php 
        $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `level`='ADMIN'");
        $query->execute();
        while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
             <div class="card">
                <div class="card-body">
                <h4 class="header-title">FORM UBAH PASSWORD</h4>
                <form action="module/akun/ubahPassword.php" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary">
                                <h5 class="text-dark"><i class="fa fa-warning"></i> Perhatian</h5>
                                <p class="text-dark">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus quod excepturi ad accusamus consectetur omnis nisi quasi earum est officiis eaque quidem, iste possimus commodi dolores amet minus ipsam? Iste!
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">USERNAME</label>
                                <input class="form-control input-rounded" type="text" id="example-text-input" name="username" value="<?= $data["username"]; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">KONFIRMASI PASSWORD LAMA</label>
                                <input class="form-control input-rounded" type="password" id="example-text-input" name="password_lama" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">PASSWORD BARU</label>
                                <input class="form-control input-rounded" type="password" id="example-text-input" name="password_baru" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-rounded btn-primary">
                            <i class="fa fa-edit"></i> UBAH PASSWORD
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>  
     <?php   }
    ?>
   
</div>