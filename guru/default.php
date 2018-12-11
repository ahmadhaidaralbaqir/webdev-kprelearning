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
                                                        $jumlahMateri =+ $data2["jumlahMateri"];
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
                                                while($data = $query->fetch(PDO::FETCH_LAZY)){
                                                    $query2 = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahUlangan` FROM  `ulangan` WHERE `id_bab`= '$data[id_bab]'");
                                                    $query2->execute();
                                                    
                                                    while($data2= $query2->fetch(PDO::FETCH_LAZY)){
                                                        $jumlahUlangan =+ $data2["jumlahUlangan"];
                                                        $jumlahUlangan ++;
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
                    <!-- siswa online -->
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="card mt-2">
                                <div class="card-body pb-0">
                                    <h4 class="header-title">Siswa Online</h4>
                                    <div id="socialads" style="height: 245px;"></div>
                                </div>
                            </div>
                        </div>
                    <!-- siswa online end -->
                    <!-- data siswa yang di ajara  -->
                    <div class="col-md-8 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data siswa yang di ajar</h4>
                                <div class="single-table">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                  
                    <!-- data siswa yang di ajar end -->
                    </div>