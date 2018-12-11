 <?php
    session_start();
    require_once '../../../config/koneksi.php';
    $query = $koneksiDb->prepare("SELECT * FROM `materi` WHERE `nip` ='$_SESSION[nip]'");
    $query->execute();
    $no=1;
    while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
    <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $data["nama_materi"]; ?></td>
        <td>10</td>
         <td>   
            <button class="btn btn-danger btn-sm" onclick="return hapusMateri('<?= $data['kode_materi']; ?>')" id="<?= $data['id_bab']; ?>"><i class="fa fa-trash"></i></button>
            <button class="btn btn-primary btn-sm "  onclick="return tampilkanModalEditMateri('<?= $data['kode_materi']; ?>')"><i class="fa fa-edit"></i></button>
        </td>
    </tr>
 <?php $no++;   }
?>