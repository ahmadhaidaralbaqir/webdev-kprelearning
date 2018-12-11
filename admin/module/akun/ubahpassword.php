<?php
    require_once '../../../config/koneksi.php';
    $username = $_POST["username"];
    $password_lama = md5($_POST["password_lama"]);
    $password_baru = md5($_POST["password_baru"]);
    
    $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `level` = 'ADMIN'");
    $query->execute();
    while($data = $query->fetch(PDO::FETCH_LAZY)){
        if($data["password"] == $password_lama){
            echo  "<script>alert('Konfirmasi password lama tidak sama'); window.location='../../index.php?mod=formubahpassword'</script>";
        }else{
            $updatePassword = $koneksiDb->prepare("UPDATE user SET `password` = '$password_baru' WHERE `level` = 'ADMIN'");
            if($updatePassword->execute()){
                echo  "<script>alert('berhasil ubah password'); window.location='../../index.php?mod=formubahpassword'</script>";                
            }
        }
    }
?>