<?php 
    require_once "../../../config/koneksi.php";
    $id_user = $_POST["id_user"];
    $nisn =  addslashes($_POST["nisn"]);
    $nama =  addslashes($_POST["nama"]);
    $username = addslashes($_POST["username"]);
    $password = addslashes(md5($_POST["password"]));
    $kelas = addslashes($_POST["kelas"]);
    
    $query[] = "INSERT INTO `user` (`id_user`,`username`,`password`,`level`,`login_status`,`terakhir_login`)VALUES ('$id_user','$username','$password','SISWA','0','')";
    $query[] = "INSERT INTO `siswa` (`nisn`, `nama_siswa`, `jk_siswa`, `alamat_siswa`, `pic_profile_siswa`, `ttl_siswa`, `kode_kelas`, `id_user`) VALUES ('$nisn', '$nama', '', '', '', '', '$kelas', '$id_user')";
    foreach($query as $key => $value){
        $jalankanQuery = $koneksiDb->prepare($value);
        if($jalankanQuery->execute()){
            echo 1;
        }else{
            echo 0;
        }
    }
?>