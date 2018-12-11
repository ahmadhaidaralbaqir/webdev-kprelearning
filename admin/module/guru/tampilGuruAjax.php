<?php
        require_once '../../../config/koneksi.php';
        $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `level` = 'GURU'");
        $query->execute();
        $no=1;
        while($data = $query->fetch(PDO::FETCH_LAZY)){ 
            $id_user = $data["id_user"]; 
            $query2 = $koneksiDb->prepare("SELECT * FROM `guru` WHERE `id_user` = '$id_user'");
            $query2->execute();
            $data2 = $query2->fetch(PDO::FETCH_LAZY);
            $nama = $data2["nama_guru"];
            $username = $data["username"];
            $telepon = $data2["tlp_guru"];

        ?>
        <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $nama; ?></td>
            <td><?= $username; ?></td>
            <td><?= $telepon; ?></td>
            <td> 
                <button type="button" class="btn btn-danger btn-xs" onclick="return hapusGuru('<?= $id_user ?>')"><i class="fa fa-trash"></i></button>               
            </td>
        </tr>
        <?php $no++;   }
    ?>