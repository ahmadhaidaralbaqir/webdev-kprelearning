
<!-- Progress Table start -->
<div class="col-12 mt-5">
<?php if(isset($_GET["notif"])) require_once 'alert.php';?>    
    <div class="card">
        
        <div class="card-body">
            <div class="row mt-4">
            <div class="col-md-12 mb-3">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target=".modal-tambah-guru"><i class="ti-save"></i> Tambah guru </a>
                <a href="?mod=formtambahguru" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-print"></i> Export Excel </a>
            </div>
            <div class="col-12">
                <h4 class="header-title">Data guru</h4>
            </div>
            </div>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelGuru">
                        <?php
                            $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `level` = 'GURU'");
                            $query->execute();
                            $no=1;
                            while($data = $query->fetch(PDO::FETCH_LAZY)){ 
                                $id_user = $data["id_user"]; 
                                $query2 = $koneksiDb->prepare("SELECT * FROM `guru` WHERE `id_user` = '$id_user'");
                                $query2->execute();
                                $data2 = $query2->fetch(PDO::FETCH_LAZY);
                                $nama = $data2["nama_guru"];
                                $username = $data["username"];
                                $telepon = $data2["tlp_guru"];

                            ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $nama; ?></td>
                                <td><?= $username; ?></td>
                                <td><?= $telepon; ?></td>
                          
                                <td>     
                                   
                                        <button type="button" class="btn btn-danger btn-xs" onclick="return hapusGuru('<?= $id_user ?>')"><i class="fa fa-trash"></i></button>
                                  
                                </td>
                            </tr>
                         <?php $no++;   }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>