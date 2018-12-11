 <?php
 require_once '../../../config/koneksi.php';
    $query = $koneksiDb->prepare("SELECT * FROM `mapel` ");
    $query->execute();
    $no=1;
    while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
    <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $data["nama_mapel"]; ?></td> 
        <td>
            <button class="btn btn-danger btn-sm" onclick="return hapusMapel('<?= $data['kode_mapel']; ?>')"><i class="fa fa-trash"></i></button>
            <button class="btn btn-primary btn-sm" onclick="return tampilKanModalEditMapel('<?= $data['kode_mapel']; ?>')"><i class="fa fa-edit"></i></button>
        </td>
    </tr>
 <?php $no++;   }
?>