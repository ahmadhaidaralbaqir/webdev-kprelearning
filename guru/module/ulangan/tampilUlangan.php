
<!-- Progress Table start -->
<div class="row">
    <div class="col align-selft-start"></div>
     <div class="col-11 mt-5">
    <div class="card card-bordered">
        <div class="card-body">
            <div class="row mt-3 mb-3">
               
                <div class="col-12 mb-3">
                    <a href="#" class="btn btn-rounded btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-ulangan"><i class="fa fa-save"></i> Tambah Ulangan</a>
                    <a href="" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-print"></i> Unduh Excel</a>
                </div>
                <div class="col-8">
                    <h4 class="header-title">Data ulangan</h4>
                </div>
               
            </div>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Nama bab</th>
                                <th scope="col">Tgl ulangan</th>
                                <th scope="col">Drs ulangan</th>
                                <th scope="col"> Token</th>
                                <th scope="col">Jenis ulangan</th>
                                <th scope="col">Status ulangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelUlangan">
                            <?php 
                                $query = $koneksiDb->prepare("SELECT `kelas`.`nama_kelas`, `bab`.*, `ulangan`.*
                                    FROM `kelas`
                                        INNER JOIN `bab` ON `bab`.`kode_kelas` = `kelas`.`kode_kelas`
                                        JOIN `ulangan` ON `ulangan`.`id_bab` = `bab`.`id_bab`
                                    WHERE `ulangan`.`nip` = '$_SESSION[nip]'");
                                $query->execute();
                                $no= 1;
                                while($data = $query->fetch(PDO::FETCH_LAZY)){?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $data["nama_kelas"]; ?></td>
                                        <td>
                                         <?= $data['nama']; ?>
                                        </td>
                                        <td><?= $data["tgl_ulangan"]; ?></td>
                                        <td><?= $data["durasi_ulangan"]?></td>
                                        <td><p class="text-muted"><?= $data["kode_token"]?></p></td>
                                        <td><?php 
                                            if($data["jenis_ulangan"] == "1"){
                                                echo "Harian";
                                            }else{
                                                echo "Remedial";
                                            }
                                        ?></td>
                                        <td>
                                            <?php 
                                                if ($data["status_ulangan"] == "1") {
                                                    ?>
                                                        <button class="btn btn-success" onclick="return NonAktifkanUlangan('<?= $data['id_ulangan']?>')">Non Aktifkan</button>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <button class="btn btn-danger" onclick="return aktifkanUlangan('<?= $data['id_ulangan']?>')">Aktifkan</button>
                                                    <?php
                                                }
                                             ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="return tampilkanModalEditUlangan('<?= $data["id_ulangan"]; ?>')"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" onclick="return hapusUlangan('<?= $data["id_ulangan"] ?>')"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                              <?php $no++; }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="col align-selft-end"></div>
</div>
