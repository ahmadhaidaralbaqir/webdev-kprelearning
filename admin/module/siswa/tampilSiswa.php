
<!-- Progress Table start -->
<div class="col-12 mt-5">
<?php if(isset($_GET["notif"])) require_once 'alert.php';?>    
    <div class="card">
        <div class="card-body">
        <div class="row mt-4">
            <div class="col-md-12 mb-3">
                <a href="?mod=formtambahsiswa" class="btn btn-primary btn-sm btn-rounded"  data-toggle="modal" data-target=".modal-tambah-siswa"><i class="ti-save"></i> Tambah siswa </a>
            </div>
            <div class="col-6">
                <h4 class="header-title">Data siswa</h4>
            </div>
            <div class="col-6">
            <div class="input-group mb-3">
            <input type="text" class="form-control" aria-label="Text input with dropdown button">

                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Berdasarkan kelas</button>
                            <div class="dropdown-menu">
                                <?php
                                    $tampilKelas = $koneksiDb->prepare("SELECT * FROM `kelas`");
                                    $tampilKelas->execute();
                                    while($data = $tampilKelas->fetch(PDO::FETCH_LAZY)){
                                        echo "<a class='dropdown-item' href='?mod=siswa&kode_kelas=".$data["kode_kelas"]."'>".$data["nama_kelas"]."</a>";
                                    }
                                ?>
                              
                            </div>
                        </div>
                    </div>
            </div>
        </div> 
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                    
                                <th scope="col">NO</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSiswa">
                        <?php
                            if(isset($_GET["kode_kelas"])){
                               $query = $koneksiDb->prepare("SELECT * FROM `siswa` WHERE `kode_kelas` = '$_GET[kode_kelas]'");
                               $query->execute();
                               $no=1;
                               if($query->rowCount() >= 1){
                                    while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>

                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= $data["nisn"]; ?></td>
                                            <td><?= $data["nama_siswa"]; ?></td>
                                            <td>
                                                <?php
                                                    $query2 = $koneksiDb->prepare("SELECT * FROM `user` WHERE `id_user` = '$data[id_user]'");
                                                    $query2->execute();
                                                    $data2 = $query2->fetch(PDO::FETCH_LAZY);
                                                    $status =  $data2["status"];
                                                    echo $data2["username"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $query3 = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                                                    $query3->execute();
                                                    $data3 = $query3->fetch(PDO::FETCH_LAZY);
                                                    echo $data3["nama_kelas"];
                                                ?>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger btn-xs" onclick="return hapusSiswa('<?= $id_user ?>')"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                               <?php   $no++;  }
                               }else{
                                   
                                 echo "<tr><td colspan='6'>tidak ada ada</td></tr>";
                               }
                               
                            }else{
                                $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `level` = 'siswa'");
                                $query->execute();
                                $no=1;
                                while($data = $query->fetch(PDO::FETCH_LAZY)){
                                    $id_user = $data["id_user"]; 
                                    $query2 = $koneksiDb->prepare("SELECT * FROM `siswa` WHERE `id_user` = '$id_user'");
                                    $query2->execute();
                                    $data2 = $query2->fetch(PDO::FETCH_LAZY);
                                    $nisn = $data2["nisn"];
                                    $kode_kelas = $data2["kode_kelas"];
                                    $nama = $data2["nama_siswa"];
                                    $username = $data["username"];
                                    $status = $data["status"];
                                    ?>
                             <tr>   
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $nisn; ?></td>
                                <td><?= $nama; ?></td>
                                <td><?= $username;?></td>
                                <td><?php
                                    $query3 = $koneksiDb->prepare("SELECT * FROM kelas WHERE kode_kelas = '$kode_kelas'");
                                    $query3->execute();
                                    while($data3 = $query3->fetch(PDO::FETCH_LAZY)){
                                        echo $data3["nama_kelas"];
                                    }
                                ?></td> 
                                <td>
                                <button type="button" class="btn btn-danger btn-xs" onclick="return hapusSiswa('<?= $id_user ?>')"><i class="fa fa-trash"></i></button>                                    
                                </td>
                            </tr>
                             <?php  $no++;  }

                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>