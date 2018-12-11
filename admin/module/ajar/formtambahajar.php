<!-- Textual inputs start -->
<div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><i class="ti-save"></i> Form tambah ajar</h4>
                <form action="module/ajar/tambahAjar.php" method="POST">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nama guru</label>
                    <select name="nip" class="form-control">
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
                    <select name="kode_kelas" class="form-control">
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
                    <select name="kode_mapel" class="form-control">
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
                    <select name="tahun_ajaran" class="form-control">
                        <option selected disabled>[ Pilih tahun ajaran ]</option>
                        <option value="2016-2017">2016-2017</option>
                        <option value="2017-2018">2017-2018</option>
                        <option value="2018-2020">2019-2020</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2023-2024">2023-2024</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-primary mb-3"><i class="ti-save"></i> SIMPAN DATA</button>
                    <button class="btn btn-outline-danger mb-3"><i class="ti-close"></i> BATAL</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>  
                            <!-- Textual inputs end -->