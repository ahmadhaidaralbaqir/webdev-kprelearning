<!-- Textual inputs start -->
<div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><i class="ti-save"></i> Form tambah guru</h4>
                <form action="module/guru/tambahGuru.php" method="POST">
                <?php
                    $query = $koneksiDb->prepare("SELECT max(id_user) AS idUserTerbesar FROM user");
                    $query->execute();
                    while($data = $query->fetch(PDO::FETCH_LAZY)){
                        $idUserTerbesar = $data["idUserTerbesar"];
                        $idUserTerbesar  + 1;
                        $idUserTerbesar++;
                    }
                ?>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nip</label>
                    <input class="form-control input-rounded" type="hidden" value="<?= $idUserTerbesar; ?>" id="example-text-input id_user" name="id_user">
                    <input class="form-control input-rounded" type="text" id="example-text-input nip" name="nip">
                </div>
                <div class="form-group">
                    <label for="example-name-input" class="col-form-label">Nama</label>
                    <input class="form-control input-rounded" type="text"  id="example-name-input nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="example-username-input" class="col-form-label">Username</label>
                    <input class="form-control input-rounded" type="text"  id="example-username-input username" name="username">
                </div>
                <div class="form-group">
                    <label for="example-password-input" class="col-form-label">Password</label>
                    <input class="form-control input-rounded" type="password"  id="example-password-input password" name="password">
                </div>
                <div class="form-group">
                    <label for="example-tlp-input" class="col-form-label">Telepon</label>
                    <input type="number" class="form-control input-rounded" id="example-tlp-input telepon" name="telepon">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-primary mb-3 tambahGuru"><i class="ti-save"></i> SIMPAN DATA</button>
                    <button class="btn btn-outline-danger mb-3"><i class="ti-close"></i> BATAL</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>  
                            <!-- Textual inputs end -->