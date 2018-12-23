
<!-- Progress Table start -->
<div class="row">
 <div class="col align-self-start">
 </div>
<div class="col-11 align-self-center mt-5">
    <div class="jumbotron">
        <h4 class="mb-2">Perhatian !</h4>
        <p class="mb-2">Untuk menampilkan laporan nilai ulangan siswa silahkan pilih kelas dan nisn terlebih dahulu di form di bawah ini dengan benar.</p>
        <button class="btn btn-danger">OK,Sudah Mengerti</button>
    </div>
    <div class="card card-bordered">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="col-form-label" for="example-nilaiSiswa-select-kode_kelas">Pilih kelas</label>
                        <select class="form-control" id="example-nilaiSiswa-select-kode_kelas">
                            <option selected="" disabled="">[ Pilih kelas ]</option>
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
                </div>

                 <div class="col-6">
                    <div class="form-group">
                        <label class="col-form-label" for="example-nilaiSiswa-select-nisn">Pilih Siswa</label>
                        <select class="form-control" id="example-nilaiSiswa-select-nisn">
                            <option selected="" disabled="">[ Pilih Siswa ]</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-2 mb-5 single-table">
                <div class="table-responsive" id="boxNilaiSiswa" style="display: none;">
                <button class="btn btn-primary btn-sm btn-rounded mb-3"  data-toggle="modal" data-target=".modal-tambah-soal"><i class="fa fa-print"></i> Unduh Excel </button>

                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama ulangan</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Grade</th>                                
                            </tr>
                        </thead>
                        <tbody id="tabelNilaiSiswa"></tbody>
                    </table>  
                </div>
                </div>
        </div>
    </div>
</div>
</div>
<div class="col align-self-end">
    </div>
</div>
