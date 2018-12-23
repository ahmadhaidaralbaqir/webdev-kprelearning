<!-- // modal tambah data bab -->
<div class="modal fade modal-tambah-bab">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah bab</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label" for="example-bab-input-kode_kelas">Pilih Kelas</label>
                    <select id="example-bab-input-kode_kelas" class="form-control">
                        <option selected="" disabled="">[ Pilih Kelas ]</option>   
                        <?php 
                            //query pertama untuk mengambil kode_kelas di tabel ajar
                            $query =  $koneksiDb->prepare("SELECT * FROM `ajar` WHERE `nip` = '$_SESSION[nip]'");
                            $query->execute();
                            while($data = $query->fetch(PDO::FETCH_LAZY)){
                                //query kedua untuk mengambil nama kelas di tabel kelas berdasarakan kode kelas di tabel ajar 
                                $query2 = $koneksiDb->prepare("SELECT nama_kelas FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                                $query2->execute();
                                while($data2 =$query2->fetch(PDO::FETCH_LAZY)){
                                    echo "<option value=".$data['kode_kelas'].">".$data2['nama_kelas']."</option>";
                                }
                            }
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-bab-input-bab" class="col-form-label">Nama bab</label>
                    <input type="text" class="form-control" id="example-bab-input-bab" name="bab">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahBab"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- // modal ubah data bab -->
<div class="modal fade modal-edit-bab">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form ubah bab</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label" for="example-bab-edit-kode_kelas">Kelas</label>
                    <select id="example-bab-edit-kode_kelas" class="form-control">
                        <option selected="" disabled="">[ Pilih Kelas ]</option>   
                        <?php 
                            //query pertama untuk mengambil kode_kelas di tabel ajar
                            $query =  $koneksiDb->prepare("SELECT * FROM `ajar` WHERE `nip` = '$_SESSION[nip]'");
                            $query->execute();
                            while($data = $query->fetch(PDO::FETCH_LAZY)){
                                //query kedua untuk mengambil nama kelas di tabel kelas berdasarakan kode kelas di tabel ajar 
                                $query2 = $koneksiDb->prepare("SELECT nama_kelas FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                                $query2->execute();
                                while($data2 =$query2->fetch(PDO::FETCH_LAZY)){
                                    echo "<option value=".$data['kode_kelas'].">".$data2['nama_kelas']."</option>";
                                }
                            }
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-bab-edit-nama_bab" class="col-form-label">Nama bab</label>
                    <input type="hidden" class="form-control " id="example-bab-edit-id_bab" name="bab">
                    <input type="text" class="form-control" id="example-bab-edit-nama_bab" name="bab">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editBab"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- // modal tambah data materi -->
<div class="modal fade modal-tambah-materi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah materi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                 <div class="form-group">
                    <label for="example-materi-input-kode_kelas" class="col-form-label">Pilih kelas</label>
                    <select id="example-materi-input-kode_kelas" class="form-control">
                        <option selected disabled>[ Pilih kelas ]</option>
                        <?php 
                            //query pertama untuk mengambil kode_kelas di tabel ajar
                            $query =  $koneksiDb->prepare("SELECT * FROM `ajar` WHERE `nip` = '$_SESSION[nip]'");
                            $query->execute();
                            while($data = $query->fetch(PDO::FETCH_LAZY)){
                                //query kedua untuk mengambil nama kelas di tabel kelas berdasarakan kode kelas di tabel ajar 
                                $query2 = $koneksiDb->prepare("SELECT nama_kelas FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                                $query2->execute();
                                while($data2 =$query2->fetch(PDO::FETCH_LAZY)){
                                    echo "<option value=".$data['kode_kelas'].">".$data2['nama_kelas']."</option>";
                                }
                            }
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-materi-input-id_bab" class="col-form-label">Pilih Bab</label>
                    <select id="example-materi-input-id_bab" class="form-control">
                        <option selected disabled>[ Pilih bab ]</option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-materi-input-nama_materi" class="col-form-label">Nama materi</label>
                    <input type="text" class="form-control" id="example-materi-input-nama_materi" name="bab">
                </div>
                <div class="form-group">
                    <label for="example-materi-input-isi_materi" class="col-form-label">Isi materi</label>
                    <textarea class="form-control" id="example-materi-input-isi_materi" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahMateri"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- // modal ubah data bab -->
<div class="modal fade modal-edit-materi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form ubah materi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                     <div class="form-group">
                    <label for="example-materi-edit-id_bab" class="col-form-label">Pilih bab</label>
                    <select id="example-materi-edit-id_bab" class="form-control">
                        <option selected disabled>[ Pilih bab ]</option>
                        <?php
                            $query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `nip` = '$_SESSION[nip]'");
                            $query->execute();
                            while($data = $query->fetch(PDO::FETCH_LAZY)){
                                echo "<option value=".$data['id_bab'].">".$data["nama"]."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-materi-edit-nama_materi" class="col-form-label">Nama materi</label>
                    <input type="hidden" class="form-control" id="example-materi-edit-kode_materi" name="bab">
                    <input type="text" class="form-control" id="example-materi-edit-nama_materi" name="bab">
                </div>
                <div class="form-group">
                    <label for="example-materi-edit-isi_materi" class="col-form-label">Isi materi</label>
                    <textarea class="form-control" id="example-materi-edit-isi_materi" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editMateri"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>  

<!-- modal tambah ulangan -->
<div class="modal fade modal-tambah-ulangan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah ulangan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="example-ulangan-input-kode_token" class="col-form-label">Kode token</label>
                        <?php
                            // membuat kode token 
                            $karakter = "01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                            $token    = "";
                            for ($i=0; $i < 5 ; $i++) { 
                                $token .= $karakter[rand(0,strlen($karakter))];
                            }
                         ?>
                        <input type="text" disabled="" class="form-control" id="example-ulangan-input-kode_token" value="<?= $token; ?>">
                    </div>
                    <div class="col-12 form-group">
                        <label class="col-form-label" for="example-ulangan-input-kelas">Kelas</label>
                        <select id="example-ulangan-input-kelas" class="form-control">
                            <option selected="" disabled="">[ Pilih kelas ]</option>
                            <?php 
                                // menampilkan kelas berdasarkana data ajara yang telah di tentukan oleh si administrator
                                $ajar = $koneksiDb->prepare("SELECT * FROM `ajar` WHERE `nip` = '$_SESSION[nip]'");
                                $ajar->execute();
                                while($dataAjar =  $ajar->fetch(PDO::FETCH_LAZY)){
                                    // mengambil nama kelas di tabel kelas sesuai kode_kelas di tabel ajar
                                    $ambilNamaKelas = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$dataAjar[kode_kelas]'");
                                    $ambilNamaKelas->execute();
                                    $dataNamaKelas = $ambilNamaKelas->fetch(PDO::FETCH_LAZY);
                                    echo "<option value='".$dataAjar['kode_kelas']."'>".$dataNamaKelas['nama_kelas']."</option>";
                                }
                        ?>
                        </select>
                        
                    </div>
                    <div class="col-12 form-group">
                        <label for="example-ulangan-input-id_bab" class="col-form-label">Pilih bab</label>
                        <select class="form-control" id="example-ulangan-input-id_bab">
                            <option selected disabled>[ Pilih Bab ]</option>
                            
                        </select>
                    </div>
                     <div class="col-12 form-group">
                         <label for="example-ulangan-input-jenis_ulangan" class="col-form-label">Jenis ulangan</label>
                        <select id="example-ulangan-input-jenis_ulangan" class="form-control">
                            <option selected disabled>[ Pilih jenis ulangan ]</option>
                            <option value="1">Biasa</option>
                            <option value="0">Remedial</option>
                        </select>
                    </div>
                  
                    <div class="col-6 form-group">
                         <label for="example-ulangan-input-tgl_ulangan" class="col-form-label">Tentukan tanggal ulangan</label>
                        <input type="date" class="form-control" id="example-ulangan-input-tgl_ulangan">
                    </div>
                    <div class="col-6 form-group">
                         <label for="example-ulangan-input-durasi_ulangan" class="col-form-label">Durasi ulangan</label>
                        <input type="number" class="form-control" id="example-ulangan-input-durasi_ulangan">
                    </div>
                   
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahUlangan"><i class="fa fa-save"></i> Simpan </button>
            </div>
        </div>
    </div>
</div>



<!-- modal edit ulangan -->
<div class="modal fade modal-edit-ulangan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form edit ulangan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="example-ulangan-edit-kode_token" class="col-form-label">Kode Token</label>
                        <input type="text" disabled="" class="form-control" id="example-ulangan-edit-kode_token">
                    </div>
                    <div class="col-12 form-group">
                        <label for="example-ulangan-edit-id_bab" class="col-form-label">Pilih bab</label>
                        <input type="hidden" id="example-ulangan-edit-id_ulangan">
                        <select class="form-control" id="example-ulangan-edit-id_bab">
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
                    
                     <div class="col-12 form-group">
                         <label for="example-ulangan-edit-jenis_ulangan" class="col-form-label">Jenis ulangan</label>
                        <select id="example-ulangan-edit-jenis_ulangan" class="form-control">
                            <option selected disabled>[ Pilih jenis ulangan ]</option>
                            <option value="1">Biasa</option>
                            <option value="0">Remedial</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                         <label for="example-ulangan-edit-tgl_ulangan" class="col-form-label">Tentukan tanggal ulangan</label>
                        <input type="date" class="form-control" id="example-ulangan-edit-tgl_ulangan">
                    </div>
                    <div class="col-6 form-group">
                         <label for="example-ulangan-edit-durasi_ulangan" class="col-form-label">Durasi ulangan</label>
                        <input type="number" class="form-control" id="example-ulangan-edit-durasi_ulangan">
                    </div>
                   
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editUlangan"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>


<!-- modal tambah soal -->
<div class="modal fade modal-tambah-soal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-tambah-soalitle">Form tambah soal</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="example-soal-input-pertanyaan">Pertanyaan</label>
                            <input type="text" class="form-control"  id="example-soal-input-pertanyaan">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-input-pilihan_a">A</label>
                             <textarea id="example-soal-input-pilihan_a" class="form-control"></textarea>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-input-pilihan_b">B</label>
                             <textarea id="example-soal-input-pilihan_b" class="form-control"></textarea>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-input-pilihan_c">C</label>
                             <textarea id="example-soal-input-pilihan_c" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-input-pilihan_d">D</label>
                             <textarea id="example-soal-input-pilihan_d" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="example-soal-input-kunci_jawaban">Kunci Jawaban</label>
                            <input type="text" class="form-control"  id="example-soal-input-kunci_jawaban">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="tambahSoal"><i class="fa fa-save"></i> Simpan </button>
            </div>
        </div>
    </div>
</div>


<!-- modal edit soal -->
<div class="modal fade modal-edit-soal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-tambah-soalitle">Form edit soal</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="example-soal-input-pertanyaan">Pertanyaan</label>
                            <input type="hidden" class="form-control"  id="example-soal-edit-id_soal">
                            <input type="text" class="form-control"  id="example-soal-edit-pertanyaan">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-edit-pilihan_a">A</label>
                             <textarea id="example-soal-edit-pilihan_a" class="form-control"></textarea>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-edit-pilihan_b">B</label>
                             <textarea id="example-soal-edit-pilihan_b" class="form-control"></textarea>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-edit-pilihan_c">C</label>
                             <textarea id="example-soal-edit-pilihan_c" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                             <label class="col-form-label" for="example-soal-edit-pilihan_d">D</label>
                             <textarea id="example-soal-edit-pilihan_d" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="example-soal-edit-kunci_jawaban">Kunci Jawaban</label>
                            <input type="text" class="form-control"  id="example-soal-edit-kunci_jawaban">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary" id="editSoal"><i class="fa fa-save"></i> Simpan Perubahan </button>
            </div>
        </div>
    </div>
</div>

<!-- modal ubah password -->
<div class="modal fade modal-edit-password">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="module/auth/ubahPassword.php">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-tambah-soalitle">Form ubah password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                        $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `id_user` ='$_SESSION[id_user]'");
                        $query->execute();
                        while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_user" value="<?= $data["id_user"]; ?>">
                                    <input type="hidden"  name="password_lama" value="<?= $data["password"]; ?>">
                                    <label class="col-form-label" for="konfirmasi-password-lama">Konfirmasi Password Lama</label>
                                    <input type="password" class="form-control" name="konfirmasi_password_lama" id="konfirmasi-password-lama" value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="password-baru">Password Baru</label>
                                    <input type="text" class="form-control"  id="password-baru" name="password_baru">
                                </div>
                            </div>
                      <?php  }
                     ?>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button type="submit" class="btn btn-rounded btn-primary" id="ubahPassword"><i class="fa fa-save"></i> Simpan Perubahan </button>
            </div>
        </div>
    </form>
    </div>
</div>
