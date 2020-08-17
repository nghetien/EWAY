<?php
    session_start();
    if(isset($_SESSION['TOKEN'])){
        if(strlen($_SESSION['TOKEN'])==128){
            header('Refresh: 0; URL=login.php');
            exit();
        }
    }
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDataBase";
    $connet = new mysqli($severname,$username,$password,$dbname);
    if(isset($_GET['key'])){
        $sql = "SELECT * FROM USER WHERE TOKEN="."'".$_GET['key']."'";
        $result = $connet->query($sql);
        if($result->num_rows >0){
            $sql = "
            UPDATE USER
            SET ISACTIVE = 1
            WHERE TOKEN ="."'".$_GET['key']."'";
            if($connet->query($sql)){
                $_SESSION['TOKEN']=$_GET['key'];
                header('Location:profile.php');
            }
        }
    }
?>