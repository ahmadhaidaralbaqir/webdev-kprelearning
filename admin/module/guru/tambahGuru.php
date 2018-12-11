<?php
    require_once '../../../config/koneksi.php';
    $idUser = addslashes(trim($_POST["id_user"]));
    $nip = addslashes(trim($_POST["nip"]));
    $nama = addslashes(trim($_POST["nama"]));
    $username = addslashes(trim($_POST["username"]));
    $password = md5(addslashes(trim($_POST["password"])));
    $telepon = addslashes(trim($_POST["telepon"]));

    $query[] = "INSERT INTO `user` (`id_user`,`username`,`password`,`level`,`login_status`,`terakhir_login`)VALUES ('$idUser','$username','$password','GURU','0','')";
    $query[] = "INSERT INTO `guru` (`nip`,`nama_guru`,`jk_guru`,`alamat_guru`,`tlp_guru`,`id_user`)VALUES ('$nip','$nama','','','$telepon','$idUser')";

    try{
        foreach($query as $key => $value){
            $query = $koneksiDb->prepare($value);
            if($query->execute()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }catch(PDOExcepotion $e){
        echo $e->getMessage();
    }
?>