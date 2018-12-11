
<!-- Progress Table start -->
<div class="col-12 mt-5">
    <?php if(isset($_GET["notif"])) require_once 'alert.php';?>
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
            <div class="col-md-12 mb-3">
                <a href="#" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target=".modal-tambah-ajar"><i class="ti-save"></i> Tambah ajar </a>
                <a href="?mod=formtambahguru" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-print"></i> Export Excel </a>
            </div>
            <div class="col-6">
                <h4 class="header-title">Data ajar</h4>
            </div>
           
        </div>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nip</th>
                                <th scope="col">Nama guru</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Tahun ajaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelAjar">
                        <?php
                            $query = $koneksiDb->prepare("SELECT * FROM `ajar` ");
                            $query->execute();
                            $no=1;
                            while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data["nip"]; ?></td>
                                <td>
                                <?php
                                    $query2 = $koneksiDb->prepare("SELECT * FROM `guru` WHERE `nip` = '$data[nip]'");
                                    $query2->execute();
                                    while($data2 = $query2->fetch(PDO::FETCH_LAZY)){
                                        echo $data2["nama_guru"];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php
                                    $query3 = $koneksiDb->prepare("SELECT * FROM `mapel` WHERE `kode_mapel` = '$data[kode_mapel]'");
                                    $query3->execute();
                                    while($data3 = $query3->fetch(PDO::FETCH_LAZY)){
                                        echo $data3["nama_mapel"];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php
                                    $query4 = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                                    $query4->execute();
                                    while($data4 = $query4->fetch(PDO::FETCH_LAZY)){
                                        echo $data4["nama_kelas"];
                                    }
                                ?>
                                </td>
                                <td><?= $data["tahun_ajaran"]; ?></td>
                                <td>
                                  <button class="btn btn-danger btn-sm" onclick="return hapusAjar('<?= $data['id_ajar']; ?>')"><i class="fa fa-trash"></i></button>
                                  <button class="btn btn-primary btn-sm tampilkanModalEditAjar" id="<?= $data["id_ajar"]; ?>"><i class="fa fa-edit"></i></button>
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