<!-- // modal tambah data guru -->
<div class="modal fade modal-tambah-guru">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah guru</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                    $query = $koneksiDb->prepare("SELECT max(id_user) AS idUserTerbesar FROM user");
                    $query->execute();
                    while($data = $query->fetch(PDO::FETCH_LAZY)){
                        $idUserTerbesar = $data["idUserTerbesar"];
                        $idUserTerbesar  + 1;
                        $idUserTerbesar++;
                    }
                ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="example-text-input-nip" class="col-form-label">Nip</label>
                            <input class="form-control input-rounded" type="hidden" value="<?= $idUserTerbesar; ?>" id="example-text-input-id_user-guru" name="id_user">
                            <input class="form-control input-rounded" type="text" id="example-text-input-nip" name="nip">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="example-name-input-nama" class="col-form-label">Nama</label>
                            <input class="form-control input-rounded" type="text"  id="example-name-input-nama" name="nama">
                        </div>
                    </div>
                </div>   
                
               
                <div class="form-group">
                    <label for="example-username-input-username" class="col-form-label">Username</label>
                    <input class="form-control input-rounded" type="text"  id="example-username-input-username" name="username">
                </div>
                <div class="form-group">
                    <label for="example-password-input-password" class="col-form-label">Password</label>
                    <input class="form-control input-rounded" type="password"  id="example-password-input-password" name="password">
                </div>
                <div class="form-group">
                    <label for="example-tlp-input-telepon" class="col-form-label">Telepon</label>
                    <input type="number" class="form-control input-rounded" id="example-tlp-input-telepon" name="telepon">
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahGuru"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- // modal tambah data siswa -->
<div class="modal fade modal-tambah-siswa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
            <form action="module/siswa/tambahSiswa.php" method="POST">
                <?php
                    $query = $koneksiDb->prepare("SELECT max(id_user) AS idUserTerbesar FROM user");
                    $query->execute();
                    while($data = $query->fetch(PDO::FETCH_LAZY)){
                        $idUserTerbesar = $data["idUserTerbesar"];
                        $idUserTerbesar  + 1;
                        $idUserTerbesar++;
                    }
                ?>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nisn</label>
                    <input class="form-control input-rounded" type="hidden" value="<?= $idUserTerbesar; ?>" id="example-text-input-id_user-siswa" name="id_user">
                    <input class="form-control input-rounded" type="text" id="example-text-input-nisn" name="nisn">
                </div>
                <div class="form-group">
                    <label for="example-name-input" class="col-form-label">Nama</label>
                    <input class="form-control input-rounded" type="text"  id="example-name-input-name" name="nama">
                </div>
                <div class="form-group">
                    <label for="example-username-input-siswa" class="col-form-label">Username</label>
                    <input class="form-control input-rounded" type="text"  id="example-username-input-siswa">
                </div>
                <div class="form-group">
                    <label for="example-password-input-siswa" class="col-form-label">Password</label>
                    <input class="form-control input-rounded" type="password"  id="example-password-input-siswa" name="password">
                </div>
                <div class="form-group">
                    <label for="example-kls-input-kls" class="col-form-label">Kelas</label>
                    <select name="kelas" class="form-control input-rounded" id="example-kls-input-kls">
                        <option selected disabled>[ Pilih kelas ]</option>
                        <?php 
                            $query  = $koneksiDb->prepare("SELECT * FROM kelas");
                            $query->execute();
                            while($data = $query->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data->kode_kelas.">".$data->nama_kelas."</option>";
                            }
                        ?>
                    </select>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahSiswa"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- modal tambah kelas -->
<div class="modal fade modal-tambah-kelas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah kelas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="example-name-input-kelas" class="col-form-label">Nama kelas</label>
                    <input class="form-control input-rounded" type="text" id="example-name-input-kelas" name="nama_kelas" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahKelas"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- modal edit kelas -->
<div class="modal fade modal-edit-kelas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form edit kelas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="example-name-input-kelas" class="col-form-label">Nama kelas</label>
                    <input class="form-control input-rounded" type="hidden" id="example-name-edit-kode-kelas" required>
                    <input class="form-control input-rounded" type="text" id="example-name-edit-nama-kelas" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editKelas"><i class="fa fa-save"></i> Simpan perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah ajar -->
<div class="modal fade modal-tambah-ajar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah ajar</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama guru</label>
                    <select name="nip" class="form-control" id="nip">
                        <option selected disabled>[ Pilih guru ]</option>
                        <?php
                            $tampilGuru = $koneksiDb->prepare("SELECT * FROM `guru`");
                            $tampilGuru->execute();
                            while($data = $tampilGuru->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['nip'].">".$data["nama_guru"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Kelas</label>
                    <select name="kode_kelas" class="form-control" id="kode_kelas">
                        <option selected disabled>[ Pilih kelas ]</option>
                        <?php
                            $tampilKelas = $koneksiDb->prepare("SELECT * FROM `kelas`");
                            $tampilKelas->execute();
                            while($data = $tampilKelas->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['kode_kelas'].">".$data["nama_kelas"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Mapel</label>
                    <select name="kode_mapel" class="form-control" id="kode_mapel">
                        <option selected disabled>[ Pilih mapel ]</option>
                        <?php
                            $tampilMapel = $koneksiDb->prepare("SELECT * FROM `mapel`");
                            $tampilMapel->execute();
                            while($data = $tampilMapel->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['kode_mapel'].">".$data["nama_mapel"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Tahun ajaran</label>
                    <select name="tahun_ajaran" class="form-control" id="tahun_ajaran">
                        <option selected disabled>[ Pilih tahun ajaran ]</option>
                        <option value="2016-2017">2016-2017</option>
                        <option value="2017-2018">2017-2018</option>
                        <option value="2018-2020">2019-2020</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2023-2024">2023-2024</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahAjar"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit ajar -->
<div class="modal fade modal-edit-ajar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form edit ajar</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama guru</label>
                    <input type="hidden" id="edit-id_ajar">
                    <select name="nip" class="form-control" id="edit-nip">
                        <option selected disabled>[ Pilih guru ]</option>
                        <?php
                            $tampilGuru = $koneksiDb->prepare("SELECT * FROM `guru`");
                            $tampilGuru->execute();
                            while($data = $tampilGuru->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['nip'].">".$data["nama_guru"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Kelas</label>
                    <select name="kode_kelas" class="form-control" id="edit-kode_kelas">
                        <option selected disabled>[ Pilih kelas ]</option>
                        <?php
                            $tampilKelas = $koneksiDb->prepare("SELECT * FROM `kelas`");
                            $tampilKelas->execute();
                            while($data = $tampilKelas->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['kode_kelas'].">".$data["nama_kelas"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Mapel</label>
                    <select name="kode_mapel" class="form-control" id="edit-kode_mapel">
                        <option selected disabled>[ Pilih mapel ]</option>
                        <?php
                            $tampilMapel = $koneksiDb->prepare("SELECT * FROM `mapel`");
                            $tampilMapel->execute();
                            while($data = $tampilMapel->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['kode_mapel'].">".$data["nama_mapel"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Tahun ajaran</label>
                    <select name="tahun_ajaran" class="form-control" id="edit-tahun_ajaran">
                        <option selected disabled>[ Pilih tahun ajaran ]</option>
                        <option value="2016-2017">2016-2017</option>
                        <option value="2017-2018">2017-2018</option>
                        <option value="2018-2020">2019-2020</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2023-2024">2023-2024</option>
                    </select>   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editAjar"><i class="fa fa-save"></i> Simpan perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah mapel -->
<div class="modal fade modal-tambah-mapel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah mapel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama mapel</label>
                    <input class="form-control input-rounded" type="text" id="example-text-input-mapel" name="nama_mapel" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahMapel"><i class="fa fa-save"></i> Simpan </button>
            </div>
        </div>
    </div>
</div>

<!-- -- modal edit mapel --> 
<div class="modal fade modal-edit-mapel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah mapel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama mapel</label>
                    <input class="form-control input-rounded" type="hidden" id="example-text-edit-kode_mapel" name="nama_mapel" required>
                    <input class="form-control input-rounded" type="text" id="example-text-edit-nama_mapel" name="nama_mapel" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editMapel"><i class="fa fa-save"></i> Simpan perubahan</button>
            </div>
        </div>
    </div>
</div>

