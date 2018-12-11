<?php
    try{
       $koneksiDb = new PDO("mysql:host=localhost;dbname=elearning","root","");
       $koneksiDb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "koneksi  ke database gagal <br>".$e->getMessage();
    }   
?>