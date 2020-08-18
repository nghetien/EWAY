<?php
    function connetDataBase(){
        $severname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDataBase";
        $connet = new mysqli($severname,$username,$password,$dbname);
        return $connet;
    }
    function sqlDataBase($Par1,$Par2,$Par3){
        return  "SELECT ".$Par1." FROM USER WHERE ".$Par2." = '".$Par3."'";
    }
?>