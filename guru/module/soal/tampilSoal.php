
    <?php
        require_once '../../../config/koneksi.php';
        $id_ulangan = $_POST["id_ulangan"];
        $query = $koneksiDb->prepare("SELECT * FROM `soal` WHERE `id_ulangan` = '$id_ulangan'");
        $query->execute();
        $no=1;
        while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
        <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $data["isi_soal"]; ?></td>
            <td><?= $data["pilihan_a"]; ?></td>
            <td><?= $data["pilihan_b"]; ?></td>
            <td><?= $data["pilihan_c"]; ?></td>
            <td><?= $data["pilihan_d"]; ?></td>
            <td><?= $data["jawaban"]; ?></td>
             <td>   
                <button class="btn btn-danger btn-sm" onclick="return hapusSoal('<?= $data['id_soal']; ?>')"><i class="fa fa-trash"></i></button>
                <button class="btn btn-primary btn-sm "  onclick="return tampilkanModalEditSoal('<?= $data['id_soal']; ?>')"><i class="fa fa-edit"></i></button>
            </td>
        </tr>
     <?php $no++;   }
    ?>
