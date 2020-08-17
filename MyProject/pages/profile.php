<?php
    session_start();
    if(empty($_SESSION['TOKEN'])){
        header('Refresh: 0; URL=login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Font-icon-->
    <script src="https://kit.fontawesome.com/0496651f2b.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../src/scss/profile.css">
    <!--JQuery-->
    <script src="../src/library/JQuery/jQuery.js"></script>
    <!--JS-->

</head>
<body>
    <?php
        $token = $_SESSION['TOKEN'];
        $severname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDataBase";
        $connet = new mysqli($severname,$username,$password,$dbname);
        $sql = "SELECT * FROM USER WHERE TOKEN="."'".$token."'";
        $result = $connet->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <section class="header">
        <div class="header__background">
        </div>
    </section>
    <section class="avatar">
        <div class="avatar__container">
            <div class="avatar__content">
                <img src="../src/img/profile/download.jpeg" class="avatar__image">
            </div>
        </div>
    </section>
    <section class="profile">
        <div class="profile__container container">
            <div class="row profile__information">
                <div class="profile__left col-lg-4">
                    <div class="profile__left-content shadow">
                        <div class="profile__ID">
                            <div class="profile__setting">
                                <p class="m-0">Tên tài khoản: <?php echo $row["USERNAME"] ;?></p>
                                <span><a href="logout.php">Logout</a></span>
                            </div>
                            <p>ID: <?php echo $row["ID"] ;?></p>
                        </div>
                        <div class="profile__details pt-2">
                            <div class="profile__content">
                                <p>First Name: <?php echo $row["FIRSTNAME"] ;?></p>
                                <p>Last Name: <?php echo $row["LASTNAME"] ;?></p>
                                <p>Email: <?php echo $row["EMAIL"] ;?></p>
                                <p>Time Create:
                                    <?php
                                        $date = strtotime($row["REG_DATE"]);
                                        echo date("d-m-Y H:i:s",$date);
                                    ?></p>
                                <p>Is Active: <?php if($row["ISACTIVE"]==1){echo "true";}else{echo "false";} ;?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile__right col-lg-8">
                    <div class="profile__right-content shadow">
                        <p>Ảnh</p>
                        <div class="profile__image d-flex">
                            <img src="../src/img/profile/avatar.jpeg" class="d-block mx-1">
                            <img src="../src/img/profile/avatar.jpeg" class="d-block mx-1">
                            <img src="../src/img/profile/avatar.jpeg" class="d-block mx-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>