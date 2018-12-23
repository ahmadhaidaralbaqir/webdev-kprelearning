
<!-- Progress Table start -->
<div class="row">
    <div class="col align-self-start"></div>
    <div class="col-11 mt-5">
    <div class="card card-bordered">
        <div class="card-body">
        <div class="col-12"></div>
<div class="row mt-3 mb-3">

<div class="col-12 mb-3">
    <a href="#" class="btn  btn-primary btn-rounded btn-sm" data-toggle="modal" data-target=".modal-tambah-bab"><i class="fa fa-save"></i> Tambah Bab</a>
   
</div>
<div class="col-12">
    <h4 class="header-title">Data Bab</h4>
</div>

</div>
<div class="single-table">
<div class="table-responsive">
    <table class="table table-hover progress-table text-center dataTable">
        <thead class="text-uppercase">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Bab</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jumlah materi</th>
                <th scope="col">Jumlah ulangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="tabelBab">
        <?php
            $query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `nip` = '$_SESSION[nip]' ORDER BY `kode_kelas` ASC");
            $query->execute();
            $no=1;
            while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $data["nama"]; ?></td>
                <td>
                      <?php 
                        // query ini di gunakan untuk mengambil nama kelas di tabel kelas berdasarkan kode_kelas di tabel bab 
                        $mengambilNamaKelas = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                        $mengambilNamaKelas->execute();
                        $dataNamaKelas = $mengambilNamaKelas->fetch(PDO::FETCH_LAZY);
                        //fungsi strtolower di gunakan untuk mengubah huruf kapital menjadi huruf keci semua
                        echo "<p class='text-info'>".strtolower($dataNamaKelas["nama_kelas"])."</p>";
                        ?>
                </td>
                <td>
                    <?php
                        //query ini di gunakan untuk menghitung jumlah materi di tabel materi berdasarkan id_bab di tabel bab
                        // fungsi count di gunakan untuk menghitung jumlah record di sebuah table
                        $menghitungJumlahMateri = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahMateri` FROM `materi` WHERE `id_bab` = '$data[id_bab]'");
                        $menghitungJumlahMateri->execute();
                        $dataMateri = $menghitungJumlahMateri->fetch(PDO::FETCH_LAZY);
                        echo $dataMateri["jumlahMateri"];
                    ?>
                </td>
                <td>
                <?php
                        //query ini di gunakan untuk menghitung jumlah materi di tabel materi berdasarkan id_bab di tabel bab
                        // fungsi count di gunakan untuk menghitung jumlah record di sebuah table
                        $menghitungJumlahUlangan = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahUlangan` FROM `ulangan` WHERE `id_bab` = '$data[id_bab]'");
                        $menghitungJumlahUlangan->execute();
                        $dataUlangan = $menghitungJumlahUlangan->fetch(PDO::FETCH_LAZY);
                         $dataUlangan["jumlahUlangan"];
                        if($dataUlangan["jumlahUlangan"] == 0){
                            echo '<button class="btn btn-secondary">Buat Ulangan</button>';
                        }else{
                            echo $dataUlangan["jumlahUlangan"];
                        }
                    ?>
                </td> 
                <td>
                    <button class="btn btn-danger  btn-sm" onclick="return hapusBab('<?= $data['id_bab']; ?>')" id="<?= $data['id_bab']; ?>"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-primary btn-sm "  onclick="return tampilkanModalEditBab('<?= $data['id_bab']; ?>')"><i class="fa fa-edit"></i></button>
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
<div class="col align-slef-end"></div>
</div>
