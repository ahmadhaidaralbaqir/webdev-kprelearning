<?php
    require "../../../config/koneksi.php";
    $id_user = addslashes($_POST["id_user"]);
    $query[] = "DELETE FROM siswa WHERE id_user = '$id_user'";
    $query[] = "DELETE FROM user WHERE id_user = '$id_user'";
    foreach($query as $key => $value){
        $jalankanQuery = $koneksiDb->prepare($value);
        if($jalankanQuery->execute()){
            echo "<script>window.location='../../index.php?mod=siswa&notif=hapus&status=2'</script>";
        }else{
            "gagal menambahkan data";
        }
    }
?>