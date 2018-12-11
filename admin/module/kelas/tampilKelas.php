
<!-- Progress Table start -->
<div class="col-12 mt-5">
<?php if(isset($_GET["notif"])) require_once 'alert.php';?>    
    <div class="card">
        <div class="card-body">
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <a href="#" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target=".modal-tambah-kelas"><i class="fa fa-save"></i> Tambah kelas</a>
                <a href="?mod=formtambahguru" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-print"></i> Export Excel </a>
            </div>
            <div class='col-12 mt-3'>
                <h4 class="header-title">Data kelas</h4>
            </div>
      
        </div>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama kelas</th>
                                <th scope="col">Aksi</th>
                            </tr> 
                        </thead>
                        <tbody id="tabelKelas">
                        <?php
                            $query = $koneksiDb->prepare("SELECT * FROM `kelas` ");
                            $query->execute();
                            $no=1;
                            while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data["nama_kelas"]; ?></td> 
                                <td>
                                    <button class="btn btn-secondary btn-xs tampilkanModalEditKelas" id="<?= $data['kode_kelas']; ?>"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-xs" onclick="return hapusKelas('<?= $data[kode_kelas] ?>')"><i class="fa fa-trash"></i></button>
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