<?php
    include "../src/global/connectDB.php";
    include "../src/global/funcCheckInput.php";
    $connet = connetDataBase();
    $sql = "SELECT * FROM USER WHERE RESETPWD="."'".$_GET['key']."'";
    $result = $connet->query($sql);
    if($result->num_rows == 0){
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
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
    <link rel="stylesheet" href="../src/scss/resetpwd.css">
    <!--JQuery-->
    <script src="../src/library/JQuery/jQuery.js"></script>
    <!--JS-->
</head>
<body>
<?php
//    include "../src/global/connectDB.global";
//    include "../src/global/funcCheckInput.global";
    $msg = "";
    $check = false;
    if(isset($_POST['send']) && !empty($_POST['password1']) && !empty($_POST['password2'])){
        if($_POST['password1'] == $_POST['password1']){
            if(checkPassword($_POST['password1'])){
                $connet = connetDataBase();
                $password = md5($_POST['password1']);
                $resetPwd = bin2hex(random_bytes(10));
                $sql = "UPDATE USER SET PASSWORD="."'".$password."'".", RESETPWD= "."'".$resetPwd."'"."WHERE RESETPWD = "."'".$_GET['key']."'";
                if($connet ->query($sql)){
                    $check=true;
                    $msg = "Successfully";
                    header("Refresh:1,URL=profile.php");
                }
                else{
                    $check=false;
                    $msg="Faild";
                }
            }else{
                $check=false;
                $msg = "Incorrect account format";
            }
        }else{
            $check = false;
            $msg = "Passwords are different";
        }
    }
?>
<section class="main">
    <div class="main__wrapper">
        <div class="main__row row">
            <div class="main__container col-xl-8 col-11 shadow-lg">
                <div class="main__content row">
                    <form method="POST" class="main__form">
                        <div class="form-group">
                            <label for="password" class="main__label"  id="labelPwd">PASSWORD</label>
                            <input type="password" class="form-control main__input" placeholder="Password"
                                   id="password1" name="password1"  required">
                        </div>
                        <div class="form-group">
                            <label for="password" class="main__label"  id="labelPwd">RETURN PASSWORD</label>
                            <input type="password" class="form-control main__input" placeholder="Return Password"
                                   id="password2" name="password2"  required">
                        </div>
                        <p class="text-center
                            <?php
                        if($check){
                            echo "text-success";
                        }else{
                            echo "text-danger";
                        }
                        ?>"><?php echo $msg; ?></p>
                        <div class="main__btn d-flex justify-content-center">
                            <button type="submit" class="btn text-light main__btn-login" name="send" id="send">
                                Send
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>