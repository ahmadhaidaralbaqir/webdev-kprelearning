<?php 
    require_once '../../../config/koneksi.php';
    session_start();
    $query = $koneksiDb->prepare("SELECT `kelas`.`nama_kelas`, `bab`.*, `ulangan`.*
        FROM `kelas`
            INNER JOIN `bab` ON `bab`.`kode_kelas` = `kelas`.`kode_kelas`
            JOIN `ulangan` ON `ulangan`.`id_bab` = `bab`.`id_bab`
        WHERE `ulangan`.`nip` = '$_SESSION[nip]'");
    $query->execute();
    $no= 1;
    while($data = $query->fetch(PDO::FETCH_LAZY)){?>
        <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $data["nama_kelas"]; ?></td>
            <td>
             <?= $data['nama']; ?>
            </td>
            <td><?= $data["tgl_ulangan"]; ?></td>
            <td><?= $data["durasi_ulangan"]?></td>
            <td><p class="text-muted"><?= $data["kode_token"]?></p></td>
            <td><?php 
                if($data["jenis_ulangan"] == "1"){
                    echo "Harian";
                }else{
                    echo "Remedial";
                }
            ?></td>
            <td>
               <?php 
                    if ($data["status_ulangan"] == "1") {
                        ?>
                            <button class="btn btn-success" onclick="return NonAktifkanUlangan('<?= $data['id_ulangan']?>')">Non Aktifkan</button>
                        <?php
                    }else{
                        ?>
                            <button class="btn btn-danger" onclick="return aktifkanUlangan('<?= $data['id_ulangan']?>')">Aktifkan</button>
                        <?php
                    }
                 ?>
            </td>
            <td>
                <button class="btn btn-primary" onclick="return tampilkanModalEditUlangan('<?= $data["id_ulangan"]; ?>')"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger" onclick="return hapusUlangan('<?= $data["id_ulangan"] ?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
      <?php $no++; }
    ?>