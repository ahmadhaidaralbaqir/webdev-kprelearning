
<!-- Progress Table start -->
<div class="row">
 <div class="col align-self-start">
 </div>
<div class="col-11 align-self-center mt-5">
    
    <div class="card card-bordered">
        <div class="card-body">
            <div class="row mt-3 mb-3">
               
                <div class="col-md-12 mb-3">
                    <a href="#" class="btn btn-rounded btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-materi"><i class="fa fa-save"></i> Tambah Materi</a>
                    <a href="" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-print"></i> Unduh Excel</a>
                </div>
                <div class="col-md-8">
                    <h4 class="header-title">Data Materi</h4>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label for="example-bab-edit-nama_bab" class="col-form-label">Filter berdasarkan bab</label>
                            <select class="form-control" id="id_bab" onchange="filterMateri()">
                                <option selected disabled>[ Pilih Bab ]</option>
                                <?php
                                    $query =$koneksiDb->prepare("SELECT * FROM `bab` WHERE `nip` ='$_SESSION[nip]'");
                                    $query->execute();
                                    while($data = $query->fetch(PDO::FETCH_LAZY)){
                                        echo "<option value=".$data['id_bab'].">".$data['nama']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                </div>
            </div>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama materi</th>
                                <th scope="col">Jumlah siswa belajar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelMateri">
                        <?php
                            $query = $koneksiDb->prepare("SELECT * FROM `materi` WHERE `nip` ='$_SESSION[nip]'");
                            $query->execute();
                            $no=1;
                            while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data["nama_materi"]; ?></td>
                                <td>10</td>
                                 <td>   
                                    <button class="btn btn-danger btn-sm" onclick="return hapusMateri('<?= $data['kode_materi']; ?>')"><i class="fa fa-trash"></i></button>
                                    <button class="btn btn-primary btn-sm "  onclick="return tampilkanModalEditMateri('<?= $data['kode_materi']; ?>')"><i class="fa fa-edit"></i></button>
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
<div class="col align-self-end">
    </div>
</div>
