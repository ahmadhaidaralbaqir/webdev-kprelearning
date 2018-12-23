<?php
	require_once '../../../config/koneksi.php';
    $username = $_POST["username"];
    $password = htmlentities(md5($_POST["password"]));
    
    $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
    $query->execute();
    if($query->rowCount() >= 1){
      session_start();
       while($data = $query->fetch(PDO::FETCH_LAZY)){
          $updateStatus = $koneksiDb->prepare("UPDATE `user` SET `login_status` = '1', `terakhir_login` = CURRENT_TIMESTAMP WHERE `id_user` = '$data[id_user]'");
          $updateStatus->execute();
         	if($data["level"] =="GURU"){
              $_SESSION["id_user"] = $data["id_user"];               
              $_SESSION["login"] = true;
              $_SESSION["hak_akses"] = "guru"; 
         		echo 2;
         }else{

              $_SESSION["id_user"] = $data["id_user"];               
              $_SESSION["login"] = true;
              $_SESSION["hak_akses"] = "siswa";
         		echo 3;
         }
      }	
    }else{
        echo 0;
    }
    
?>