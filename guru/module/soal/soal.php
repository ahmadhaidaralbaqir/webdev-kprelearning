
<!-- Progress Table start -->
<div class="row">
 <div class="col align-self-start">
 </div>
<div class="col-11 align-self-center mt-5">
    
    <div class="card card-bordered">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="col-form-label" for="example-soal-select-kode_kelas">Pilih kelas</label>
                        <select class="form-control" id="example-soal-select-kode_kelas">
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
                        <label class="col-form-label" for="example-soal-select-id_ulangan">Pilih Ulangan</label>
                        <select class="form-control" id="example-soal-select-id_ulangan">
                            <option selected="" disabled="">[ Pilih Ulangan ]</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-2 mb-5 single-table">
                <div class="table-responsive" id="boxSoal" style="display: none;">
                <button class="btn btn-primary btn-sm btn-rounded mb-3"  data-toggle="modal" data-target=".modal-tambah-soal"><i class="fa fa-save"></i> Buat Soal</button>

                    <table class="table table-hover progress-table text-center dataTable">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pertanyaan</th>
                                <th scope="col">A</th>
                                <th scope="col">B</th>
                                <th scope="col">C</th>
                                <th scope="col">D</th>
                                <th scope="col">Jawaban</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSoal"></tbody>
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
