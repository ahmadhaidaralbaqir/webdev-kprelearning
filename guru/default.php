                    <!-- widget overview -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mt-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i>Bab</div>
                                            <h2><?php
                                                $query = $koneksiDb->prepare("SELECT COUNT(*) AS jumlahBab FROM bab WHERE nip = '$_SESSION[nip]'");
                                                $query->execute();
                                                $data = $query->fetch(PDO::FETCH_LAZY);
                                                    echo $data["jumlahBab"];
                                             ?></h2>
                                        </div>
                                        <canvas id="seolinechart1" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-share"></i> Materi</div>
                                            <h2><?php
                                               $query = $koneksiDb->prepare("SELECT * FROM bab WHERE nip = '$_SESSION[nip]'");
                                                $query->execute();
                                                while($data = $query->fetch(PDO::FETCH_LAZY)){
                                                    $query2 = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahMateri` FROM  `materi` WHERE `id_bab`= '$data[id_bab]'");
                                                    $query2->execute();
                                                    
                                                    while($data2= $query2->fetch(PDO::FETCH_LAZY)){
                                                        $jumlahMateri + $data2["jumlahMateri"];
                                                        $jumlahMateri ++;
                                                    }

                                                }
                                                echo $jumlahMateri;
                                             ?></h2>
                                        </div>
                                        <canvas id="seolinechart2" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                           <div class="col-md-4 mt-md-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-thumb-up"></i> Ulangan</div>
                                            <h2>
                                                <?php
                                               $query = $koneksiDb->prepare("SELECT * FROM bab WHERE nip = '$_SESSION[nip]'");
                                                $query->execute();
                                                $jumlahUlangan = 0;
                                                while($data = $query->fetch(PDO::FETCH_LAZY)){
                                                    $query2 = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahUlangan` FROM  `ulangan` WHERE `id_bab`= '$data[id_bab]'");
                                                    $query2->execute();
                                                    while($data2= $query2->fetch(PDO::FETCH_LAZY)){
                                                        $jumlahUlangan + $data2["jumlahUlangan"];
                                                        $jumlahUlangan++;
                                                    }
                                                }
                                            echo $jumlahUlangan;
                                             ?>
                                            </h2>
                                        </div>
                                        <canvas id="seolinechart1" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card mt-2">
                                <div class="card-body pb-100">
                                    <h4 class="header-title">DATA KELAS YANG DI AJAR</h4>
                                    <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center dataTable">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Kelas</th>
                                                    <th scope="col">Jumlah Siswa</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabelAjar">
                                                <?php 
                                                    $no = 1;
                                                    $query = $koneksiDb->prepare("SELECT `kelas`.`nama_kelas`,`kelas`.`kode_kelas`, `ajar`.`nip` FROM `ajar`
                                                    INNER JOIN `kelas` ON `kelas`.`kode_kelas` = `ajar`.`kode_kelas` WHERE `ajar`.`nip` = '$_SESSION[nip]'");
                                                    $query->execute();
                                                    while ($data = $query->fetch(PDO::FETCH_LAZY)) { ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $data["nama_kelas"]; ?></td>
                                                            <td>
                                                                <?php 
                                                                    $hitungJumlahSiswa = $koneksiDb->prepare("SELECT COUNT(*) AS jumlahSiswa FROM siswa WHERE `kode_kelas` = '$data[kode_kelas]'");

                                                                    $hitungJumlahSiswa->execute();
                                                                    $jumlahSiswa = $hitungJumlahSiswa->fetch(PDO::FETCH_LAZY);
                                                                    echo $jumlahSiswa["jumlahSiswa"];
                                                                 ?>
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
                    </div>
                  
                    </div>