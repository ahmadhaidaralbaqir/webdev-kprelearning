<div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i> Guru</div>
                                            <h2>
                                                <?php
                                                    $hitungTotalGluru = $koneksiDb->prepare("SELECT count(*) AS `total_guru` FROM guru");
                                                    $hitungTotalGluru->execute();
                                                    $data = $hitungTotalGluru->fetch(PDO::FETCH_LAZY);
                                                    echo $data["total_guru"];
                                               ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i> Kelas</div>
                                            <h2>
                                            <?php
                                                    $hitungTotalKelas = $koneksiDb->prepare("SELECT count(*) AS `total_kelas` FROM `kelas`");
                                                    $hitungTotalKelas->execute();
                                                    $data = $hitungTotalKelas->fetch(PDO::FETCH_LAZY);
                                                    echo $data["total_kelas"];
                                               ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i>Siswa</div>
                                            <h2>
                                            <?php
                                                    $hitungTotalSiswa = $koneksiDb->prepare("SELECT count(*) AS `total_siswa` FROM `siswa`");
                                                    $hitungTotalSiswa->execute();
                                                    $data = $hitungTotalSiswa->fetch(PDO::FETCH_LAZY);
                                                    echo $data["total_siswa"];
                                               ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i>Mapel</div>
                                            <h2>
                                            <?php
                                                    $hitungTotalMapel = $koneksiDb->prepare("SELECT count(*) AS `total_mapel` FROM `mapel`");
                                                    $hitungTotalMapel->execute();
                                                    $data = $hitungTotalMapel->fetch(PDO::FETCH_LAZY);
                                                    echo $data["total_mapel"];
                                               ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i> Ulangan</div>
                                            <h2>
                                            <?php
                                                    $hitungTotalUlangan = $koneksiDb->prepare("SELECT count(*) AS `total_ulangan` FROM `ulangan`");
                                                    $hitungTotalUlangan->execute();
                                                    $data = $hitungTotalUlangan->fetch(PDO::FETCH_LAZY);
                                                    echo $data["total_ulangan"];
                                               ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i> Materi</div>
                                            <h2>
                                            <?php
                                                    $hitungTotalMateri = $koneksiDb->prepare("SELECT count(*) AS `total_materi` FROM `materi`");
                                                    $hitungTotalMateri->execute();
                                                    $data = $hitungTotalMateri->fetch(PDO::FETCH_LAZY);
                                                    echo $data["total_materi"];
                                               ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                    <!-- Social Campain area start -->
                   
</div>    
    
                    <!-- Social Campain area end -->
                   