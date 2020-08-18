<?php
//        $sql = "
//        CREATE TABLE USER( TOKEN CHAR(150) NOT NULL,
//                            RESETPWD CHAR(150) NOT NULL,
//                            CHECKRESET INT NOT NULL,
//                            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//                            FIRSTNAME VARCHAR(30) NOT NULL,
//                            LASTNAME VARCHAR(30) NOT NULL,
//                            USERNAME VARCHAR(30) NOT NULL,
//                            EMAIL VARCHAR(50) NOT NULL,
//                            PASSWORD VARCHAR(150) NOT NULL,
//                            REG_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//                            ISACTIVE INT NOT NULL)
//        ";
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