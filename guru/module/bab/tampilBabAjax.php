<?php
        require_once '../../../config/koneksi.php';
        session_start();
        $query = $koneksiDb->prepare("SELECT * FROM `bab` WHERE `nip` = '$_SESSION[nip]' ORDER BY `kode_kelas` ASC ");
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
                    echo $dataNamaKelas["nama_kelas"];
                 ?>
            </td>
            <td>
                <?php
                    $menghitungJumlahMateri = $koneksiDb->prepare("SELECT COUNT(*) AS `jumlahMateri` FROM `materi` WHERE `id_bab` = '$data[id_bab]' ");
                    $menghitungJumlahMateri->execute();
                    $dataMateri = $menghitungJumlahMateri->fetch(PDO::FETCH_LAZY);
                    echo $dataMateri["jumlahMateri"];
                ?>
            </td>
            <td>
            <?php
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
                <button class="btn btn-danger btn-sm" onclick="hapusBab('<?= $data['id_bab']; ?>')"><i class="fa fa-trash"></i></button>
                <button class="btn btn-primary btn-sm" onclick="return tampilkanModalEditBab('<?= $data['id_bab']; ?>')"><i class="fa fa-edit"></i></button>
            </td>
                </tr>
        <?php $no++;   }
    ?>

    