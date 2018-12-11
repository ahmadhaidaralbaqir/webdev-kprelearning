
<!-- Progress Table start -->
<div class="col-12 mt-5">
<?php if(isset($_GET["notif"])) require_once 'alert.php';?>    
    <div class="card">
        <div class="card-body">
            <div class="row mt-3 mb-3">
               
                <div class="col-12 mb-3">
                    <a href="#" class="btn btn-rounded btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-mapel"><i class="fa fa-save"></i> TAMBAH MAPEL</a>
                    <a href="" class="btn btn-rounded btn-success btn-sm"><i class="fa fa-print"></i> EXPORT EXCEL</a>
                </div>
                <div class="col-12">
                    <h4 class="header-title">Data mapel</h4>
                </div>
                
            </div>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama mapel</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelMapel">
                        <?php
                            $query = $koneksiDb->prepare("SELECT * FROM `mapel` ");
                            $query->execute();
                            $no=1;
                            while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data["nama_mapel"]; ?></td> 
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="return hapusMapel('<?= $data['kode_mapel']; ?>')"><i class="fa fa-trash"></i></button>
                                    <button class="btn btn-primary btn-sm tampilKanModalEditMapel" id="<?= $data['kode_mapel']; ?>"><i class="fa fa-edit"></i></button>
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