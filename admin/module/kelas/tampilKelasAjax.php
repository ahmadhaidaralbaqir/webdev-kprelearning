 <?php
        require_once '../../../config/koneksi.php';
        $query = $koneksiDb->prepare("SELECT * FROM `kelas` ");
        $query->execute();
        $no=1;
        while($data = $query->fetch(PDO::FETCH_LAZY)){ ?>
        <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $data["nama_kelas"]; ?></td> 
            <td>
                <button class="btn btn-secondary btn-xs" onclick="return tampilkanModalEditKelas('<?= $data['kode_kelas'] ?>')" id="<?= $data['kode_kelas']; ?>"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger btn-xs" onclick="return hapusKelas('<?= $data['kode_kelas'] ?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
     <?php $no++;   }
?>