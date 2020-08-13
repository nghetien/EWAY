<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MYDB";
    $connet = new mysqli($severname,$username,$password,$dbname);


//    $sql = "
//    CREATE TABLE USER
//    (ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    FIRSTNAME VARCHAR(30) NOT NULL,
//    LASTNAME VARCHAR(30) NOT NULL,
//    USERNAME VARCHAR(30) NOT NULL,
//    EMAIL VARCHAR(50) NOT NULL,
//    PASSWORD VARCHAR(30) NOT NULL,
//    REG_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
//    ";
    $sql = "SELECT * FROM USER";
    $result = $connet->query($sql);

    if($result->num_rows > 0){
        echo "Data consits of ".$result->num_rows." lines";
        while($row = $result->fetch_assoc()){
            $data = "<br>";
            $data .= "ID:".$row['ID']."--";
            $data .= "FIRSTNAME: ".$row['FIRSTNAME']."--";
            $data .= "LASTNAME: ".$row['LASTNAME']."--";
            $data .= "USERNAME: ".$row['USERNAME']."--";
            $data .= "EMAIL: ".$row['EMAIL']."--";
            $data .= "PASSWORD: ".$row['PASSWORD']."--";
            $data .= "REG_DATE: ".$row['REG_DATE']."<br>";
            echo $data;
        }
    }else{
        echo "0 results";
    }

    $connet->close();
?>