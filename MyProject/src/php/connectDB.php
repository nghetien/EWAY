<?php
//        $sql = "
//        CREATE TABLE USERS
//        (
//        TOKEN CHAR(130) NOT NULL,
//        ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        FIRSTNAME VARCHAR(30) NOT NULL,
//        LASTNAME VARCHAR(30) NOT NULL,
//        USERNAME VARCHAR(30) NOT NULL,
//        EMAIL VARCHAR(50) NOT NULL,
//        PASSWORD VARCHAR(30) NOT NULL,
//        REG_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//        ISACTIVE INT NOT NULL,
//        AVATAR IMA)
//        ";
//        if($connet->query($sql)){
//            echo "successfully";
//        } else {
//            echo "Failded"."<br>". $connet->error;
//        }
//    $severname = "localhost";
//    $username = "root";
//    $password = "";
//    $dbname = "myDataBase";
//    $connet = new mysqli($severname,$username,$password,$dbname);
//    $sql = "SELECT * FROM USER";
//    $result = $connet->query($sql);
//
//    if($result->num_rows > 0){
//        echo "Data consits of ".$result->num_rows." lines";
//        while($row = $result->fetch_assoc()){
//            $data = "<br>";
//            $data .= "TOKEN:".$row['TOKEN']."--";
//            $data .= "ID:".$row['ID']."--";
//            $data .= "FIRSTNAME: ".$row['FIRSTNAME']."--";
//            $data .= "LASTNAME: ".$row['LASTNAME']."--";
//            $data .= "USERNAME: ".$row['USERNAME']."--";
//            $data .= "EMAIL: ".$row['EMAIL']."--";
//            $data .= "PASSWORD: ".$row['PASSWORD']."--";
//            $data .= "REG_DATE: ".$row['REG_DATE']."<br>";
//            $data .= "ISACTIVE: ".$row['ISACTIVE']."<br>";
//            echo $data;
//        }
//    }else{
//        echo ($result->num_rows)."results";
//    }
//
//    $connet->close();
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