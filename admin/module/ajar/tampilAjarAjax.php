 <?php
    require_once '../../../config/koneksi.php';
    $query = $koneksiDb->prepare("SELECT * FROM `ajar` ");
    $query->execute();
    $no=1;
    while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
    <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $data["nip"]; ?></td>
        <td>
        <?php
            $query2 = $koneksiDb->prepare("SELECT * FROM `guru` WHERE `nip` = '$data[nip]'");
            $query2->execute();
            while($data2 = $query2->fetch(PDO::FETCH_LAZY)){
                echo $data2["nama_guru"];
            }
        ?>
        </td>
        <td>
        <?php
            $query3 = $koneksiDb->prepare("SELECT * FROM `mapel` WHERE `kode_mapel` = '$data[kode_mapel]'");
            $query3->execute();
            while($data3 = $query3->fetch(PDO::FETCH_LAZY)){
                echo $data3["nama_mapel"];
            }
        ?>
        </td>
        <td>
        <?php
            $query4 = $koneksiDb->prepare("SELECT * FROM `kelas` WHERE `kode_kelas` = '$data[kode_kelas]'");
            $query4->execute();
            while($data4 = $query4->fetch(PDO::FETCH_LAZY)){
                echo $data4["nama_kelas"];
            }
        ?>
        </td>
        <td><?= $data["tahun_ajaran"]; ?></td>
        <td>
          <button class="btn btn-danger btn-sm" onclick="return hapusAjar('<?= $data['id_ajar']; ?>')"><i class="fa fa-trash"></i></button>
          <button class="btn btn-primary btn-sm tampilkanModalEditAjar" onclick="return tampilkanModalEditAjar('<?= $data['id_ajar']; ?>')"><i class="fa fa-edit"></i></button>
        </td>
    </tr>
 <?php $no++;   }
?>