<?php
    require "../../../config/koneksi.php";
    $id_user = addslashes(trim($_POST["id_user"]));
    $query[] = "DELETE FROM guru WHERE id_user = '$id_user'";
    $query[] = "DELETE FROM user WHERE id_user = '$id_user'";
    try{
        foreach($query as $key => $value){
            $jalankanQuery = $koneksiDb->prepare($value);
            if($jalankanQuery->execute()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }catch(PDOExeception $e){
        echo $e->getMessage();      
    }
?>