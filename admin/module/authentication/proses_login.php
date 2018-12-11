<?php
    require_once '../../../config/koneksi.php';
    $username = $_POST["username"];
    $password = htmlentities(md5($_POST["password"]));
    
    $query = $koneksiDb->prepare("SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password' AND `level` = 'ADMIN' ");
    $query->execute();
    if($query->rowCount() >= 1){
        session_start();
        $_SESSION["login"] =true;
        $_SESSION["username"] = $username;
        $_SESSION["level"] = "ADMIN";
        echo 1;        
    }else{
        echo 0;
    }
    
?>