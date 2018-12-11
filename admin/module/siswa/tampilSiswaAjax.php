<?php
    require_once '../../../config/koneksi.php';

    $query = $koneksiDb->prepare("SELECT * FROM siswa");
    $query->execute();
    $no=1;
    while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
         <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $data["nisn"]; ?></td>
            <td><?= $data["nama_siswa"]; ?></td>
            <td>
                <?php
                    $query2 = $koneksiDb->prepare("SELECT * FROM `user` WHERE `id_user` = '$data[id_user]'");
                    $query2->execute();
                    $data2 = $query2->fetch(PDO::FETCH_LAZY);
                    $status =  $data2["status"];
                    echo $data2["username"];
                ?>
            </td>
            <td>
                <?php
                    $query3 = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
                    $query3->execute();
                    $data3 = $query3->fetch(PDO::FETCH_LAZY);
                    echo $data3["nama_kelas"];
                ?>
            </td>
          
            <td>
                <button type="button" class="btn btn-danger btn-xs" onclick="return hapusSiswa('<?= $id_user ?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
 <?php $no++;  }
?>